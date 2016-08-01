<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Channel;
use App\Http\Requests\CreateChannelRequest;
use App\Http\Requests\UpdateChannelRequest;
use Illuminate\Http\Request;

use App\User;


class ChannelController extends Controller {

	/**
	 * Display a listing of channel
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $channel = Channel::with("user")->get();

		return view('admin.channel.index', compact('channel'));
	}

	/**
	 * Show the form for creating a new channel
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $user = User::lists("name", "id")->prepend('Please select', '');

	    
	    return view('admin.channel.create', compact("user"));
	}

	/**
	 * Store a newly created channel in storage.
	 *
     * @param CreateChannelRequest|Request $request
	 */
	public function store(CreateChannelRequest $request)
	{
	    
		Channel::create($request->all());

		return redirect()->route('admin.channel.index');
	}

	/**
	 * Show the form for editing the specified channel.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$channel = Channel::find($id);
	    $user = User::lists("name", "id")->prepend('Please select', '');

	    
		return view('admin.channel.edit', compact('channel', "user"));
	}

	/**
	 * Update the specified channel in storage.
     * @param UpdateChannelRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateChannelRequest $request)
	{
		$channel = Channel::findOrFail($id);

        

		$channel->update($request->all());

		return redirect()->route('admin.channel.index');
	}

	/**
	 * Remove the specified channel from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Channel::destroy($id);

		return redirect()->route('admin.channel.index');
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
            Channel::destroy($toDelete);
        } else {
            Channel::whereNotNull('id')->delete();
        }

        return redirect()->route('admin.channel.index');
    }

}
