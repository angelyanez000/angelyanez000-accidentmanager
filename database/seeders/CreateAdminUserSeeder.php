<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Accident;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
  
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
        $user_admin = User::create([
            'name' => 'Angel',
            'last_name' => 'Yanez',
            'identification' => '1714886900',
            'phone' => '0922939399',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456')
        ]);
    
        $role_admin = Role::create(['name' => 'Admin']);
     
        $permissions_admin = Permission::pluck('id','id')->all();
   
        $role_admin->syncPermissions($permissions_admin);
     
        $user_admin->assignRole([$role_admin->id]);



        $user_conductor_1 = User::create([
            'name' => 'Mario Edgar',
            'last_name' => 'Jacome Viera',
            'identification' => '1714886901',
            'phone' => '0922939329',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('123456')
        ]);

        $user_conductor_2 = User::create([
            'name' => 'Lucia Maria',
            'last_name' => 'Lopez Godoy',
            'identification' => '1714886902',
            'phone' => '0922939325',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('123456')
        ]);
    
        $role_conductor = Role::create(['name' => 'Usuario']);
     
        $permissions_conductor = Permission::where('name', 'LIKE', "%accident%")->get();
   
        $role_conductor->syncPermissions($permissions_conductor);
     
        $user_conductor_1->assignRole([$role_conductor->id]);
        $user_conductor_2->assignRole([$role_conductor->id]);


        $accident_1 = Accident::create([
            'title' => 'Accidente Via Perimetral KM 3 Cliente Mario Lopez',
            'location' => 'Se encuentra en la Perimetral a 3 KM desvio a la Concordia',
            'accident_detail' => 'Choque del bus interprovincial Reina del Cisne con Vehículo liviano',
            'detail_injured_people' => 'Dos personas heridas en la que consta en el parte policial',
            'car_detail' => 'Vehículo Spark GT Full Equipo color rojo placa PCY0202',
            'event_date' =>  strtotime("2021-06-11 02:21"),
            'image' => '20211106072125.jpg',
            'user_id' => 2,
        ]);



    }
}