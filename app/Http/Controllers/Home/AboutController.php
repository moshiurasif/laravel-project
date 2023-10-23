<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\MultiImage;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function AboutPage()
    {
        $aboutPage = About::find(1);
        return view('admin.about_page.about_page_all', compact('aboutPage'));
    }


    public function UpdateAbout(Request $request)
    {
        $about_id = $request->id;
        if ($request->file('about_image')) {
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()) . "." . $image->getClientOriginalExtension();
            Image::make($image)->resize(523, 605)->save('upload/about_image/' . $name_gen);
            $save_url = 'upload/about_image/' . $name_gen;
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $save_url,
            ]);

            Toastr::success('About Page Updated with Image successfully', 'Success', ["options"]);
            return redirect()->back();
        } else {
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
            ]);

            Toastr::success('About Page Updated without Image successfully', 'Success', ["options"]);
            return redirect()->back();
        }
    }

    public function About()
    {
        return view('frontend.about_page.about');
    }

    public function MultiImage()
    {
        return view('admin.about_page.multi_image');
    }

    public function StoreMultiImage(Request $request)
    {
        $image = $request->file('multi_image');
        foreach ($image as $multi_image) {
            $name_gen = hexdec(uniqid()) . "." . $multi_image->getClientOriginalExtension();
            Image::make($multi_image)->resize(220, 220)->save('upload/multi_image/' . $name_gen);
            $save_url = 'upload/multi_image/' . $name_gen;
            MultiImage::insert([
                'multi_image' => $save_url,
                'created_at' => Carbon::now()
            ]);
        }
        Toastr::success('Multi Image Updated successfully', 'Success', ["options"]);
        return redirect()->back();
    }

    public function AllMultiImage()
    {
        $allMultiImage = MultiImage::all();
        return view('admin.about_page.all_multi_image', compact('allMultiImage'));
    }

    public function EditMultiImage($id)
    {
        $multiImage = MultiImage::findOrFail($id);
        return view('admin.about_page.edit_multi_image', compact('multiImage'));
    }

    public function UpdateMultiImage(Request $request)
    {
        $multiImageId = $request->id;
        if ($request->file('multi_image')) {
            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()) . "." . $image->getClientOriginalExtension();
            Image::make($image)->resize(220, 220)->save('upload/multi_image/' . $name_gen);
            $save_url = 'upload/multi_image/' . $name_gen;
            MultiImage::findOrFail($multiImageId)->update([

                'multi_image' => $save_url,
            ]);

            Toastr::success('Multi Image successfully', 'Success', ["options"]);
            return redirect()->route('all.multi.image');
        }
    }

    public function DeleteMultiImage($id)
    {
        $multi = MultiImage::findOrFail($id);
        $img = $multi->multi_image;
        unlink($img);
        MultiImage::findOrFail($id)->delete();
        Toastr::success('Multi Image Deleted successfully', 'Success', ["options"]);
        return redirect()->route('all.multi.image');
    }
}
