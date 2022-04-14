<?php

namespace App\Http\Controllers\Record;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Record\BirthRecord;
use App\Models\Record\DeathRecord;
use App\Models\Patient;
use Image;
use Carbon\carbon;

class RecordController extends Controller
{
    // birth record view start
    public function BirthView()
    {
        $birth_records = BirthRecord::all();
        return view('record.view_birth_record', compact('birth_records'));
    }

    // birth record store start
    public function BirthStore(Request $request)
    {
        // dd( $request->all());
        $request->validate([
            'child_name' => 'required',
        ]);

        if ($request->file('child_photo') ||  $request->file('mother_photo') ||  $request->file('father_photo') || $request->file('document_photo')) {

            $image1 = $request->file('child_photo');
            $name_gen1 = hexdec(uniqid()) . '.' . $image1->getClientOriginalExtension();
            Image::make($image1)->resize(166, 110)->save('uploads/record/' . $name_gen1);
            $save_url1 = 'uploads/record/' . $name_gen1;
              
            $image2 = $request->file('mother_photo');
            $name_gen2 = hexdec(uniqid()) . '.' . $image2->getClientOriginalExtension();
            Image::make($image2)->resize(166, 110)->save('uploads/record/' . $name_gen2);
            $save_url2 = 'uploads/record/' . $name_gen2;

            $image3 = $request->file('father_photo');
            $name_gen3 = hexdec(uniqid()) . '.' . $image3->getClientOriginalExtension();
            Image::make($image3)->resize(166, 110)->save('uploads/record/' . $name_gen3);
            $save_url3 = 'uploads/record/' . $name_gen3;

            $image4 = $request->file('document_photo');
            $name_gen4 = hexdec(uniqid()) . '.' . $image4->getClientOriginalExtension();
            Image::make($image4)->resize(166, 110)->save('uploads/record/' . $name_gen4);
            $save_url4 = 'uploads/record/' . $name_gen4;
     
            BirthRecord::insert([
                'child_name' => $request->child_name,
                'gender' => $request->gender,
                'weight' => $request->weight,
                'child_photo' => $save_url1,
                'birth_date' => $request->birth_date,
                'phone' => $request->phone,
                'address' => $request->address,
                'mother_name' => $request->mother_name,
                'mother_photo' => $save_url2,
                'father_name' => $request->father_name,
                'father_photo' =>  $save_url3,
                'report' => $request->report,
                'attach_document_photo' => $save_url4,
                'created_at' => Carbon::now(),
            ]);
        } else {
            BirthRecord::insert([
                'child_name' => $request->child_name,
                'gender' => $request->gender,
                'weight' => $request->weight,
                'birth_date' => $request->birth_date,
                'phone' => $request->phone,
                'address' => $request->address,
                'mother_name' => $request->mother_name,
                'father_name' => $request->father_name,
                'report' => $request->report,
                'created_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Birth Record Upload Successfuly',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }

    // Birth Record Delete Start here
    public function BirthDelete($id)
    {
        $birth_records = BirthRecord::find($id);

        // $image1=$birth_records->child_photo;
        $birth_records->delete();

        $notification = array(
            'message' => 'Birth Record Deleted Successfuly',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }

    // Birth Record edit start here
    public function BirthEdit($id)
    {
        $birth_record = BirthRecord::find($id);
        return response()->json([
            'status' => 200,
            'birth_record' => $birth_record,
        ]);
    }

    // Birth Record Update Start here
    public function BirthUpdate(Request $request)
    {
        if ($request->file('child_photo') ||  $request->file('mother_photo') ||  $request->file('father_photo') || $request->file('document_photo')) {

            $birth_record = BirthRecord::find($request->birth_record);

            if ($request->file('child_photo')) {
                $image1 = $request->file('child_photo');
                $name_gen1 = hexdec(uniqid()) . '.' . $image1->getClientOriginalExtension();
                Image::make($image1)->resize(166, 110)->save('uploads/record/' . $name_gen1);
                $save_url1 = 'uploads/record/' . $name_gen1;
                $birth_record->child_photo = $save_url1;
            }

            if ($request->file('mother_photo')) {
                $image2 = $request->file('mother_photo');
                $name_gen2 = hexdec(uniqid()) . '.' . $image2->getClientOriginalExtension();
                Image::make($image2)->resize(166, 110)->save('uploads/record/' . $name_gen2);
                $save_url2 = 'uploads/record/' . $name_gen2;
                $birth_record->mother_photo = $save_url2;
            }

            if ($request->file('father_photo')) {
                $image3 = $request->file('father_photo');
                $name_gen3 = hexdec(uniqid()) . '.' . $image3->getClientOriginalExtension();
                Image::make($image3)->resize(166, 110)->save('uploads/record/' . $name_gen3);
                $save_url3 = 'uploads/record/' . $name_gen3;
                $birth_record->father_photo = $save_url3;
            }

            if ($request->file('document_photo')) {
                $image4 = $request->file('document_photo');
                $name_gen4 = hexdec(uniqid()) . '.' . $image4->getClientOriginalExtension();
                Image::make($image4)->resize(166, 110)->save('uploads/record/' . $name_gen4);
                $save_url4 = 'uploads/record/' . $name_gen4;
                $birth_record->attach_document_photo = $save_url4;
            }

            $birth_record->child_name = $request->child_name;
            $birth_record->gender = $request->gender;
            $birth_record->weight = $request->weight;
            $birth_record->birth_date = $request->birth_date;
            $birth_record->phone = $request->phone;
            $birth_record->address = $request->address;
            $birth_record->mother_name = $request->mother_name;
            $birth_record->father_name = $request->father_name;
            $birth_record->report = $request->report;
            $birth_record->update();
        } else {
            $birth_record = BirthRecord::find($request->birth_record_id);
            $birth_record->child_name = $request->child_name;
            $birth_record->gender = $request->gender;
            $birth_record->weight = $request->weight;
            $birth_record->birth_date = $request->birth_date;
            $birth_record->phone = $request->phone;
            $birth_record->address = $request->address;
            $birth_record->mother_name = $request->mother_name;
            $birth_record->father_name = $request->father_name;
            $birth_record->report = $request->report;
            $birth_record->update();
        }


        $notification = array(
            'message' => 'Birth Record Updated Successfuly',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }


    /************************** Death Record ******************************/
    // death record view start
    public function DeathView()
    {
        $patients = Patient::all();
        $deaths = DeathRecord::with('patient')->get();
        return view('record.view_death_record', compact('patients', 'deaths'));
    }

    // death record store start
    public function DeathStore(Request $request)
    {

        // validation
        $request->validate([
            'patient_name_id' => 'required',
            'guardian_name' => 'required',
        ]);

        if ($request->file('attachment')) {
            $image = $request->file('attachment');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(166, 110)->save('uploads/record/' . $name_gen);
            $save_url = 'uploads/record/' . $name_gen;

            // death record Insert
            DeathRecord::insert([
                'patient_name_id' => $request->patient_name_id,
                'death_date' => $request->death_date,
                'guardian_name' => $request->guardian_name,
                'attachment' => $save_url,
                'nid_number' => $request->nid_number,
                'present_address' => $request->present_address,
                'permanent_address' => $request->parmanent_address,
                'report' => $request->report,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' =>  'Death Record Added Successfully',
                'alert-type' => 'success'
            );
        } else {
            // death record Insert
            DeathRecord::insert([
                'patient_name_id' => $request->patient_name_id,
                'death_date' => $request->death_date,
                'guardian_name' => $request->guardian_name,
                'nid_number' => $request->nid_number,
                'present_address' => $request->present_address,
                'permanent_address' => $request->parmanent_address,
                'report' => $request->report,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' =>  'Death Record Added Successfully',
                'alert-type' => 'success'
            );
        }
        return Redirect()->back()->with($notification);
    }

    // Death Record Delete Start here
    public function DeathDelete($id)
    {

        $death_records = DeathRecord::find($id);

        if ($death_records->attachment) {
            $img = $death_records->attachment;
            unlink($img);
        }

        $death_records->delete();

        $notification = array(
            'message' => 'Death Record Deleted Successfuly',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }

    // Death Record edit start here
    public function DeathEdit($id)
    {
        $death_record = DeathRecord::find($id);
        return response()->json([
            'status' => 200,
            'death_record' => $death_record,
        ]);
    }

    // update death record start
    public function DeathUpdate(Request $request)
    {
        $death_record_id = $request->death_record_id;
        $old_image = $request->old_image;
        // dd($old_image);
        if ($request->file('attachment')) {
            unlink($old_image);
            $image = $request->file('attachment');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(166, 110)->save('uploads/record/' . $name_gen);
            $save_url = 'uploads/record/' . $name_gen;

            $death_record = DeathRecord::find($death_record_id);
            $death_record->patient_name_id = $request->patient_name_id;
            $death_record->death_date = $request->death_date;
            $death_record->guardian_name = $request->guardian_name;
            $death_record->nid_number = $request->nid_number;
            $death_record->attachment = $save_url;
            $death_record->present_address = $request->present_address;
            $death_record->permanent_address = $request->parmanent_address;
            $death_record->report = $request->report;
            $death_record->update();
        } else {
            $death_record = DeathRecord::find($death_record_id);
            $death_record->patient_name_id = $request->patient_name_id;
            $death_record->death_date = $request->death_date;
            $death_record->guardian_name = $request->guardian_name;
            $death_record->nid_number = $request->nid_number;
            $death_record->present_address = $request->present_address;
            $death_record->permanent_address = $request->parmanent_address;
            $death_record->report = $request->report;
            $death_record->update();
        }


        $notification = array(
            'message' => 'Death Record Updated Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }
}
