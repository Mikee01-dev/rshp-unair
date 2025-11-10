# TODO: Modify JenisHewanController to use Query Builder and ensure admin layout

## Tasks:
- [x] Modify index() method to use DB::table('jenis_hewan')->get()
- [x] Modify store() method to use DB::table('jenis_hewan')->insert()
- [x] Modify edit() method to use DB::table('jenis_hewan')->where('idjenis_hewan', $id)->first()
- [x] Modify update() method to use DB::table('jenis_hewan')->where('idjenis_hewan', $id)->update()
- [x] Modify destroy() method to use DB::table('jenis_hewan')->where('idjenis_hewan', $id)->delete()
- [x] Add use Illuminate\Support\Facades\DB; at the top
- [x] Remove use App\Models\JenisHewan; since not needed
- [x] Test the changes by running the application
