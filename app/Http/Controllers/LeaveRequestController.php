<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveRequestController extends Controller
{
    //

    public function index()
    {
        $leaveRequests = LeaveRequest::all();

        return view('backend.leave-requests.index', compact('leaveRequests'));
    }

    public function myRequests()
    {
        // Get the currently logged-in user
        $user = Auth::user();

        // Retrieve the leave requests created by the logged-in user
        $leaveRequests = LeaveRequest::where('user_id', $user->id)->get();

        return view('backend.leave-requests.my-requests', compact('leaveRequests'));
    }

    public function create()
    {
        return view('backend.leave-requests.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'description' => 'required|string',
                'from_date' => 'required|date',
                'to_date' => 'required|date|after:from_date',
            ]);

            $leaveRequest = new LeaveRequest([
                'description' => $request->input('description'),
                'from_date' => $request->input('from_date'),
                'to_date' => $request->input('to_date'),
                'status' => 'pending',
            ]);

            $leaveRequest->user()->associate(auth()->user());

            $leaveRequest->save();

            return redirect()->route('leave-requests.my-requests')->with('success', 'Leave request created successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while creating the leave request.');
        }
    }

    public function destroy(LeaveRequest $leaveRequest)
    {
        try {
            $leaveRequest->delete();

            return redirect()->route('leave-requests.index')->with('success', 'Leave request deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while deleting the leave request.');
        }
    }

    public function updateStatus(LeaveRequest $leaveRequest, Request $request)
    {
        try {
            // Validate the request and make sure the status is a valid option
            $request->validate([
                'status' => 'required', // You can define the valid status options
            ]);

            // Update the status of the leave request in the database
            $leaveRequest->update(['status' => $request->input('status')]);

            return redirect()->route('leave-requests.index')->with('success', 'Leave request status updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while updating the leave request status.');
        }
    }
}
