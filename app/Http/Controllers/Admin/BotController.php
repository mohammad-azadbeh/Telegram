<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Schema;
use App\Bot;
use App\Http\Requests\CreateBotRequest;
use App\Http\Requests\UpdateBotRequest;
use Illuminate\Http\Request;

use App\User;


class BotController extends Controller {

	/**
	 * Display a listing of bot
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        //$bot = Bot::with("user")->get();

        $user_id = Auth::user()->id;
        $bot = Bot::with("user")->get()->where('user.id',$user_id);

		return view('admin.bot.index', compact('bot'));
	}

	/**
	 * Show the form for creating a new bot
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    //$user = User::lists("name", "id")->prepend('Please select', '');

        $user_id = Auth::user()->id;
        $user = User::find($user_id);

	    
	    return view('admin.bot.create', compact("user"));
	}

	/**
	 * Store a newly created bot in storage.
	 *
     * @param CreateBotRequest|Request $request
	 */
	public function store(CreateBotRequest $request)
	{
	    
		Bot::create($request->all());

		return redirect()->route('admin.bot.index');
	}

	/**
	 * Show the form for editing the specified bot.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$bot = Bot::find($id);
	    //$user = User::lists("name", "id")->prepend('Please select', '');

        $user_id = Auth::user()->id;
        $user = User::find($user_id);

	    
		return view('admin.bot.edit', compact('bot', "user"));
	}

	/**
	 * Update the specified bot in storage.
     * @param UpdateBotRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateBotRequest $request)
	{
		$bot = Bot::findOrFail($id);

        

		$bot->update($request->all());

		return redirect()->route('admin.bot.index');
	}

	/**
	 * Remove the specified bot from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Bot::destroy($id);

		return redirect()->route('admin.bot.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            Bot::destroy($toDelete);
        } else {
            Bot::whereNotNull('id')->delete();
        }

        return redirect()->route('admin.bot.index');
    }

}
