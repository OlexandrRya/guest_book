<?php
namespace App\Http\Controllers;

use App\Guest_book_table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Validator;
use Image;
use App\Http\Controllers\Controller;

class PageController extends Controller
{

    protected $vars = array();

	public function index() {

		$articles = Guest_book_table::orderBy('created_at', 'DESC')->paginate(25);
        $this->vars = array_add($this->vars, 'articles', $articles);

		return view('index')->with($this->vars);
	}
	

	public function store(Request $request) {
	
		// $rules = ['captcha'=>'required|captcha'];
		// $validator = Validator::make( $request->all(), $rules);
		// if ( $validator->fails()) { 

		// 	echo '<script>alert("Неправильный ввод капчи, повторите попытку.");</script>';
		// 	return redirect('/');
		// }

		$articles = new Guest_book_table;
		$articles->user_name = $request["user_name"];
		$articles->email = $request['email'];
		$articles->homepage = $request['homepage'];
		$articles->text = $request['text'];


		//set file or img
		if($request->hasFile('userfile')) {

            $file = $request->file('userfile');

            //valid file img: JPG, GIF, PNG, file: TXT < 100 кб
			$extension = $file->extension();
			if ($extension != 'png' && $extension != 'gif' && $extension != 'jpeg') {
				echo '<script>alert("Неправильный недопустимый формат файла, повторите попытку.");</script>';
				return redirect('/');
			}

            //set file name in database
			$articles->file = $file->hashName();
			$file = Image::make($file);
			$file->resize(320, 240);
			//move file from local storage
			$file->save(public_path().'/file/'.$articles->file);
            // $file->move(public_path() . '/file',$file->hashName());
        }

		$articles->ip = $request->ip();
		//get version browser
		$user_agent = $request->header('User-Agent');
		if (strpos($user_agent, "Firefox") !== false) 
			$browser = "Firefox";
		elseif (strpos($user_agent, "OPR") !== false) 
			$browser = "Opera";
		elseif (strpos($user_agent, "Edge") !== false) 
			$browser = "Edge";
		elseif (strpos($user_agent, "Chrome") !== false) 
			$browser = "Chrome";
		elseif (strpos($user_agent, "MSIE") !== false) 
			$browser = "Internet Explorer";
		elseif (strpos($user_agent, "Safari") !== false) 
			$browser = "Safari";
		else $browser = "Неизвестный";
		$articles->browser_inform = $browser;
		//save data to database
		$articles->save();
		return redirect('/');
	}

	public function sort($sort_type, $sort_by) {

		if (!isset($sort_by)){

			$sort_by = 'DESC';
		}
		if ($sort_by === 'DESC' || $sort_by === 'ASC'){

			$articles = Guest_book_table::orderBy($sort_type, $sort_by)->paginate(25);
       		$this->vars = array_add($this->vars, 'articles', $articles);
		} else {

			return redirect('/');
		}

		return view('index')->with($this->vars);
	}
}
