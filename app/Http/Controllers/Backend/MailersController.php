<?php

namespace App\Http\Controllers\Backend;

use App\Models\Mailers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Notifications\MailNotification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;

class MailersController extends Controller
{
    public function index()
    {
        $lists = Mailers::orderBy('created_at', 'desc')->get();
        // Thẻ meta
        $meta['title'] = 'Quản lý mailer';
        // Return View
        return view('backend.mailers.index', compact('meta','lists'));
    }

    public function add()
    {
        // Thẻ meta
        $meta['title'] = 'Thêm mailer';
        // Return View
        return view('backend.mailers.add', compact('meta'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:mailers',
            'content' => 'required',
            'file' => 'required',
        ], [
            'title.required' => 'Tên mailer không được để trống',
            'title.unique' => 'Tên mailer này đã tồn tại',
            'content.required' => 'Nội dung không được để trống',
            'file.required' => 'File không được để trống'
        ]);
        $mailer = new Mailers();
        $mailer->title = $request->title;
        $mailer->content = $request->content;
        /** Upload File ------*/
        // if ($request->file('file')){
        //     $file = $request->file('file');
        //     $path = Storage::putFile('files', $file);
        //     $url = Storage::url($path);
        //     $mailer->file = $url;
        // }
        if ($request->file('file')){
            $file = $request->file('file');
            // Lưu file vào thư mục 'mailers' trong storage
            $path = $file->store('mailers');
            // Lưu đường dẫn file vào cơ sở dữ liệu
            $mailer->file = $path;
        }
        /** End Upload File ------*/
        $mailer->save();
        return redirect()->route('admin.mailers.index')->with('msg', 'Thêm mailer thành công');
    }

    public function send(Mailers $mailer)
{
    $mailer = Mailers::find($mailer->id);

    // Kiểm tra nếu file tồn tại
    if (!$mailer->file || !Storage::exists($mailer->file)) {
        return redirect()->back()->with('error', 'File không tồn tại');
    }

    // Đọc file Excel
    $filePath = storage_path('app/' . $mailer->file);
    $data = Excel::toArray([], $filePath);

    if (empty($data) || empty($data[0])) {
        return redirect()->back()->with('error', 'File Excel không có dữ liệu');
    }

    // Lấy danh sách email và dữ liệu từ file Excel
    $emailsData = $data[0]; // Lấy dữ liệu từ sheet đầu tiên

    // Chia danh sách email thành các nhóm 5 email
    $emailChunks = array_chunk($emailsData, 5);

    foreach ($emailChunks as $chunk) {
        foreach ($chunk as $row) {
            // Kiểm tra và lấy dữ liệu từ các cột
            $email = $row[2] ?? null; // Cột thứ 3 (index 2) chứa email
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Gửi thông báo qua Notification
                Notification::route('mail', $email)->notify(new MailNotification($row, $mailer));
            }
        }
        // Thêm thời gian nghỉ giữa các nhóm để tránh bị giới hạn gửi email
        sleep(2); // Nghỉ 2 giây giữa mỗi nhóm
    }

    return redirect()->route('admin.mailers.index')->with('msg', 'Gửi email thành công');
}

    public function edit()
    {
        // Thẻ meta
        $meta['title'] = 'Chỉnh sửa mailer';
        // Return View
        return view('backend.mailers.edit', compact('meta'));
    }

    public function delete(Mailers $mailer)
    {
        $mailer = Mailers::find($mailer->id);
        if ($mailer->file) {
            Storage::delete($mailer->file);
        }
        $mailer->delete();
        return redirect()->route('admin.mailers.index')->with('msg', 'Xóa mailer thành công');
    }
}
