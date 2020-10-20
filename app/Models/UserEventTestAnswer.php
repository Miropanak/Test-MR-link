<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class UserEventTestAnswer extends Model{
    protected $table = 'event_test_user';
    protected $fillable = [
        'answers', 'start_time', 'end_time', 'time_spent', 'obtained_points', 'test_id', 'user_id', 'event_id'
    ];

    public function test()
    {
        return $this->belongsTo('App\Models\Test', 'test_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function event()
    {
        return $this->belongsTo('App\Models\Event', 'event_id');
    }
}