<?php

 namespace App\Models;

 use Illuminate\Database\Eloquent\Factories\HasFactory;
 use Illuminate\Foundation\Auth\User as Authenticatable;
 use Illuminate\Notifications\Notifiable;
 use Laravel\Sanctum\HasApiTokens;
 use Illuminate\Contracts\Auth\MustVerifyEmail;
 use Illuminate\Database\Eloquent\Casts\Attribute;
 
 class User extends Authenticatable implements MustVerifyEmail
 {
     use HasApiTokens, HasFactory, Notifiable;
 
     /**
      * The attributes that are mass assignable.
      *
      * @var array<int, string>
      */
     protected $fillable = [
         'name',
         'email',
         'password',
         'type'
     ];
 
     /**
      * Accessors & Mutators for the 'type' attribute
      */
     protected function type(): Attribute
     {
         return new Attribute(
             get: fn ($value) => ["user", "admin"][$value],
         );
     }
 
     /**
      * The attributes that should be hidden for arrays.
      *
      * @var array<int, string>
      */
     protected $hidden = [
         'password', 'remember_token',
     ];
 
     /**
      * The attributes that should be cast to native types.
      *
      * @var array<string, string>
      */
     protected $casts = [
         'email_verified_at' => 'datetime',
     ];
 
     /**
      * Check if the user is an admin
      *
      * @return bool
      */
     public function isAdmin()
     {
         return $this->type == 'admin';
     }
 
     /**
      * Check if the user is a regular user
      *
      * @return bool
      */
     public function isUser()
     {
         return $this->type == 'user';
     }
 }
 