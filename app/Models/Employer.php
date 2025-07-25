<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'company_website',
        'company_description',
        'industry',
        'logo',
        'is_verified'
    ];

    // Mỗi nhà tuyển dụng liên kết với một tài khoản người dùng
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Một nhà tuyển dụng có thể đăng nhiều job
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
