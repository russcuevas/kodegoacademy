<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profileAdminUrl = 'https://th.bing.com/th/id/OIP.8r4KQ83wmwJb7yI9_GjYIgHaHa?w=214&h=214&c=7&r=0&o=5&dpr=1.3&pid=1.7';
        $fileAdmin = 'profile_' . Str::random(10) . '.png';
        $imageAdmin = file_get_contents($profileAdminUrl);
        Storage::disk('public')->put('auth/images/profile_pictures/' . $fileAdmin, $imageAdmin);

        DB::table('users')->insert([
            'profile_picture' => $fileAdmin,
            'name' => 'admin',
            'email' => 'russelcuevas0@gmail.com',
            'password' => Hash::make('123456789'),
            'contact' => '09495748302',
            'user_role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $profileUsersUrl = 'https://creazilla-store.fra1.digitaloceanspaces.com/icons/7915728/user-icon-md.png';
        $fileUsers = 'profile_' . Str::random(10) . '.png';
        $imageUsers = file_get_contents($profileUsersUrl);
        Storage::disk('public')->put('auth/images/profile_pictures/' . $fileUsers, $imageUsers);

        DB::table('users')->insert([
            'profile_picture' => $fileUsers,
            'name' => 'Russel Vincent C. Cuevas',
            'email' => 'russelcuevas00@gmail.com',
            'password' => Hash::make('123456789'),
            'contact' => '09495748303',
            'user_role' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $profileInstructorUrl = 'https://icon-library.com/images/instructor-icon/instructor-icon-10.jpg';
        $fileInstructor = 'profile_' . Str::random(10) . '.png';
        $imageInstructor = file_get_contents($profileInstructorUrl);
        Storage::disk('public')->put('auth/images/profile_pictures/' . $fileInstructor, $imageInstructor);

        DB::table('users')->insert([
            'profile_picture' => $fileInstructor,
            'name' => 'Russel Instructor',
            'email' => 'russelcuevas@gmail.com',
            'password' => Hash::make('123456789'),
            'contact' => '09495748301',
            'user_role' => 'instructor',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
