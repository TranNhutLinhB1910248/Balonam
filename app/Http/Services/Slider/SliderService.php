<?php

namespace App\Http\Services\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

use App\Models\Menu;
// use Illuminate\Support\Str;

class SliderService 
{
    public function getMenu()
    {
        return Menu::where('active', 1)->get();
    }


    public function insert($request)
    {
        
        try {
            #$request->except('token');
            Slider::create($request->input());
            session()->flash('success', 'Thêm Slider mới thành công');
        } catch (\Exception $err) {
            session()->flash('error', 'Thêm Slider mới lỗi');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function get()
    {
        return Slider::with('menu')->orderByDesc('id')->paginate(15);
    }

    public function update($request, $slider)
    {
        try {
            $slider->fill($request->input());
            $slider->save();
            session()->flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            session()->flash('error', 'Có lỗi vui lòng thử lại');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request)
    {
        $slider = Slider::where('id', $request->input('id'))->first();
        if ($slider) {
            $slider->delete();
            return true;
        }

        return false;
    }

    public function show()
    {
        return Slider::where('active', 1)->orderByDesc('sort_by')->get();
    }

    


}