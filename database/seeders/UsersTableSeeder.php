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
        $profileAdminUrl = 'https://scontent.fmnl30-2.fna.fbcdn.net/v/t39.30808-6/354426023_229231946626809_2605493308577140062_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeG1BdqkKqauU4gQd95Em3cYjR5NOQhBOhGNHk05CEE6ETTb0r34fvA0co_x8h93vKzFcSk3uRtklkxR2XO_i9OB&_nc_ohc=twnu6RIWVsIAX8V1SFJ&_nc_ht=scontent.fmnl30-2.fna&oh=00_AfBhvrE3zmtwLKRh9y-tOZ7oB6r0OBOl1r95WJ3Uhd1stw&oe=65594C6F';
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
