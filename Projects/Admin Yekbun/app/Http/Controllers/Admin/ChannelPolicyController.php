<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChannelPolicy;
use Illuminate\Http\Request;

class ChannelPolicyController extends Controller
{
    public function add_policy(Request $request) {
        $data = !empty($request->input('channel_policy'));
        if($data) {
            $policy = new ChannelPolicy();
            $policy->channel_policy = $data;
            if($policy->save()) {
                return redirect()->back()->with("success", "Channel's Policy Added Successfully!");
            } else {
                return redirect()->back()->with("error", "Oops Try Again!");
            }
        } else {
            return redirect()->back()->with("error", "All Fields are required!");
        }
    }
}
