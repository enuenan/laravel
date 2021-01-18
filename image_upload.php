IN CASE OF PUBLIC PATH -->


if ($request->hasFile('image')) {
	$images = request()->file('image');
	foreach ($images as $raw_image) {
		$originalimage = Image::make($raw_image);

		$originalpath = public_path() . '/doctor/uploads/images/per_operative_images/';
		$thumbnailpath = public_path() . '/doctor/uploads/images/per_operative_images/thumbnail/';
		$random = Str::random(5);

		$name_with_extension = $raw_image->getClientOriginalName();
		$only_extension = $raw_image->getClientOriginalExtension();
		$upload_image_name = $random . '_' . uniqid() . '_' . time() . '.' . $only_extension;

		$originalimage->save($originalpath . $upload_image_name);

		$thumbnailimage = Image::make($raw_image);
		$thumbnailimage->resize(150, 150);
		$thumbnailimage->save($thumbnailpath . $upload_image_name);

		$obj = new PerOperativeImages();
		$obj->doctors_id    = $doctors_id;
		$obj->patient_id    = $id;
		$obj->per_operative_images = $upload_image_name;
		$obj->save();
	}
	return back()->with('success', 'Per Operative Images has been successfully Uploaded');
}

<!-- END OF IN CASE OF PUBLIC PATH -->


<!-- IN CASE OF STORAGE PATH -->
<!-- BEFORE USEING THIS WRITE ARTISAN COMMAND -> php artisan storage:link -->

if ($request->hasFile('image')) {
    $images = request()->file('image');
    $originalimage = Image::make($images);

    $originalpath = request()->file('image')->store('client');
    $obj->image = $originalpath;
}

<!-- END OF IN CASE OF STORAGE PATH