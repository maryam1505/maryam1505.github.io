@extends('layouts/layoutMaster')

@section('title', 'Boxicons - Icons')

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-icons.css')}}" />
@endsection
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/tagify/tagify.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/dropzone/dropzone.css')}}" />

@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/tagify/tagify.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
@endsection

@section('content')
<script>
    const dropZoneInitFunctions = [];
  </script>
{{-- Nav TAb --}}
<div class="d-flex justify-content-between">
    <div>
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Artist /</span> All Artist
        </h4>
    </div>
    <div class="">
       @can('artist.create')
       <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createartistModal">Add Artist</button>
       @endcan
    </div>
</div>

<!-- Basic Bootstrap Table -->
<div class="card">
    <h5 class="card-header">Artist List</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Artist</th>
                    <th>Gender</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                                                <tr>
                    <td>1</td>
                    <td>
                        <div class="d-flex justify-content-start align-items-center user-name">
                            <div class="avatar-wrapper">
                                <div class="avatar avatar-sm me-3"><img src="https://dash.yekbun.net/storage/music/64fdaa9e6e18c___Download.jpeg" alt="Avatar" class="rounded-circle"></div>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="javascript:void(0)" class="text-body text-truncate">
                                    <span class="fw-semibold">Şivan Perwer</span>
                                </a>
                                <!-- <small class="text-muted">Perwer</small> -->
                            </div>
                        </div>
                    </td>
                    <td>male</td>
                    <td>
                        <div class="d-flex justify-content-start align-items-center">
                            <span data-bs-toggle="modal" data-bs-target="#editartistModal5">
                                                                <button class="btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Edit"><i class="bx bx-edit"></i></button></span>
                                                            <form action="https://dash.yekbun.net/artist/5" onsubmit="confirmAction(event, () => event.target.submit())" method="post" class="d-inline">
                                <input type="hidden" name="_method" value="DELETE">                                <input type="hidden" name="_token" value="vZWRWLao4mkM3TaLxw8oI60YJ7wrJHownfBORslo">                                                                <button type="submit" class="btn btn-sm btn-icon" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Remove"><i class="bx bx-trash me-1"></i></button>
                                                            </form>

                            <div class="modal fade modal-659be5a078db0" id="editartistModal5" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class=" w-100">
                    <h4 class="modal-title" id="modalCenterTitle">Edit Artist</h4>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <style>
    .edit-form .dropzone {
        display: flex;
        flex-wrap: wrap;
    }

    .edit-form .dropzone .dz-message {
        width: 100%;
    }
</style>

<form id="editForm5" class="edit-form" method="POST" action="https://dash.yekbun.net/artist/5" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="vZWRWLao4mkM3TaLxw8oI60YJ7wrJHownfBORslo">    <input type="hidden" name="_method" value="PUT">    <div class="hidden-inputs">
        <input type="hidden" name="image" value="music/64fdaa9e6e18c___Download.jpeg" data-path="music/64fdaa9e6e18c___Download.jpeg">
    </div>
    <div class="row">
        <div class="col-lg-12 mx-auto">

            <div class="row g-3">

                <div class="col-md-12">
                    <label class="form-label" for="fullname">Gender</label>
                    <select name="gender" class="form-select">
                        <option>Select Gender</option>
                                                    <option value="male" selected="">Male</option>
                            <option value="female">Female</option>
                                            </select>
                </div>

                <div class="col-md-12">
                    <label class="form-label" for="fullname">First Name</label>
                    <input type="text" id="fullname" class="form-control" placeholder="lorem" name="first_name" value="Şivan">
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="fullname">Last Name</label>
                    <input type="text" id="fullname" class="form-control" placeholder="lorem" name="last_name" value="Perwer">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="fullname">Province</label>
                    <select name="province" class="form-control province_id" id="province_id" data-url="https://dash.yekbun.net/get/city" value="" data-selected="72">
                        <option value="">Select province</option>
                                                <option value="1">Bakur</option>
                                                <option value="2">Başûr</option>
                                                <option value="3" selected="">Rojava</option>
                                                <option value="4">Rojhilat</option>
                                            </select>
                </div>
                <div class="col-md-8">
                    <label class="form-label" for="fullname">City</label>
                    <select name="city" class="form-control city_id" id="city_id"><option value="69">Amûd</option><option value="70">Heseke (Hesîçe)</option><option value="71">Kobanî</option><option value="72" selected="">Qamîşlo</option><option value="73">Reqa</option><option value="74">Rimêlan</option><option value="75">Serê Kanîyê</option><option value="76">Efrîn</option><option value="77">Girê Spî</option><option value="78">Hecîn</option><option value="79">Şehba</option></select>
                </div>
                
                <div class="col-12">
                    <div class="card">
                        <h5 class="card-header">Image</h5>
                        <div class="card-body">
                            <div class="dropzone needsclick dz-clickable dz-started" action="/" id="dropzone-img5">
                                <div class="dz-message needsclick">
                                    Drop files here or click to upload
                                </div>
                                
                            <div class="row dz-image-preview" data-path="music/64fdaa9e6e18c___Download.jpeg">                                            <div class="col-md-12 col-12 d-flex justify-content-center">                                                <div class="dz-preview dz-file-preview w-100">                                                    <div class="dz-details">                                                        <div class="dz-thumbnail" style="width:95%">                                                            <img data-dz-thumbnail="" alt="Download.jpeg" src="https://dash.yekbun.net/storage/music/64fdaa9e6e18c___Download.jpeg">                                                            <span class="dz-nopreview">No preview</span>                                                            <div class="dz-success-mark"></div>                                                            <div class="dz-error-mark"></div>                                                            <div class="dz-error-message"><span data-dz-errormessage=""></span></div>                                                                                                                  </div>                                                        <div class="dz-filename" data-dz-name="">Download.jpeg</div>                                                            <div class="dz-size" data-dz-size=""><strong>4.5</strong> KB</div>                                                                                                        </div>                                                </div>                                            </div>                                        <a class="dz-remove" href="javascript:undefined;" data-dz-remove="">Remove file</a></div></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <label class="form-label" for="status">Status</label>
                    <select class="form-select" name="status">
                        <option selected="" value="">Select</option>
                        <option value="1" selected="">Publish</option>
                        <option value="0">UnPublish</option>
  
                    </select>

                </div>
            </div>
        </div>
    </div>
</form>


<script>
    'use strict';


    //  <div class="progress">
        // <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div>
        //                                                     </div>

    dropZoneInitFunctions.push(function() {
        // previewTemplate: Updated Dropzone default previewTemplate

        const previewTemplate = `<div class="row">
                                            <div class="col-md-12 col-12 d-flex justify-content-center">
                                                <div class="dz-preview dz-file-preview w-100">
                                                    <div class="dz-details">
                                                        <div class="dz-thumbnail" style="width:95%">
                                                            <img data-dz-thumbnail >
                                                            <span class="dz-nopreview">No preview</span>
                                                            <div class="dz-success-mark"></div>
                                                            <div class="dz-error-mark"></div>
                                                            <div class="dz-error-message"><span data-dz-errormessage></span></div>
                                                          
                                                        </div>
                                                        <div class="dz-filename" data-dz-name></div>
                                                            <div class="dz-size" data-dz-size></div>
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`;

        // image
        const dropzoneMulti1 = new Dropzone('#dropzone-img5', {
            url: 'https://dash.yekbun.net/file/upload',
            previewTemplate: previewTemplate,
            parallelUploads: 1,
            maxFilesize: 100,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': 'vZWRWLao4mkM3TaLxw8oI60YJ7wrJHownfBORslo'
            },
            sending: function(file, xhr, formData) {
                formData.append('folder', 'music');
            },
            success: function(file, response) {

                if (file.previewElement) {
                    file.previewElement.classList.add("dz-success");
                }
                file.previewElement.dataset.path = response.path;
                const hiddenInputsContainer = file.previewElement.closest('form').querySelector(
                    '.hidden-inputs');
                hiddenInputsContainer.innerHTML +=
                    `<input type="hidden" name="image" value="${response.path}" data-path="${response.path}">`;

            },
            removedfile: function(file) {
                const hiddenInputsContainer = file.previewElement.closest('form').querySelector(
                    '.hidden-inputs');
                hiddenInputsContainer.querySelector(
                    `input[data-path="${file.previewElement.dataset.path}"]`).remove();

                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }

                $.ajax({
                    url: 'https://dash.yekbun.net/artists/5/image',
                    method: 'delete',
                    headers: {
                        'X-CSRF-TOKEN': 'vZWRWLao4mkM3TaLxw8oI60YJ7wrJHownfBORslo'
                    },
                    data: {
                        path: file.previewElement.dataset.path
                    },
                    success: function() {}
                });

                return this._updateMaxFilesReachedClass();
            }
        });

                $("document").ready(() => {
            var path = "https://dash.yekbun.net/storage/music/64fdaa9e6e18c___Download.jpeg";
            var rpath = "music/64fdaa9e6e18c___Download.jpeg";
            const parts = rpath.split("___");

            imageUrlToFile(path,parts).then((file) => {
                file['status'] = "success";
                file['previewElement'] = "div.dz-preview.dz-image-preview";
                file['previewTemplate'] = "div.dz-preview.dz-image-preview";
                file['_removeLink'] = "a.dz-remove";
                // file['webkitRelativePath'] = "";
                file['width'] = 500;
                file['height'] = 500;
                file['accepted'] = true;
                file['dataURL'] = path;
                file['processing'] = true;
                file['addPathToDataset'] = true;
                dropzoneMulti1.on('addedfile', function(file) {
                    if (file.addPathToDataset)
                        file.previewElement.dataset.path = rpath;
                });
                file['upload'] = {
                    bytesSent: 0,
                    progress: 0,
                };

                // Update the preview template to include the music title

                dropzoneMulti1.emit("addedfile", file, path);
                dropzoneMulti1.emit("thumbnail", file, path);
                // dropzoneMulti1.files.push(file);
            });
        });
            })
</script>

<script>
    async function imageUrlToFile(imageUrl, fileName) {
        // Fetch the image
        const response = await fetch(imageUrl);
        const blob = await response.blob();

        // Create a File object
        const file = new File([blob], fileName[1], { type: blob.type });

        return file;
    }
</script>
            </div>
                        <div class="modal-footer">
                                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" form="editForm5" class="btn btn-primary" onclick="">Update</button>
                                                </div>
                    </div>
    </div>
</div>

                        </div>
                    </td>
                </tr>
                                <tr>
                    <td>2</td>
                    <td>
                        <div class="d-flex justify-content-start align-items-center user-name">
                            <div class="avatar-wrapper">
                                <div class="avatar avatar-sm me-3"><img src="https://dash.yekbun.net/storage/music/64fdae5193f8e___ciwan_haco.jpeg" alt="Avatar" class="rounded-circle"></div>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="javascript:void(0)" class="text-body text-truncate">
                                    <span class="fw-semibold">Çiwan Haco</span>
                                </a>
                                <!-- <small class="text-muted">Haco</small> -->
                            </div>
                        </div>
                    </td>
                    <td>male</td>
                    <td>
                        <div class="d-flex justify-content-start align-items-center">
                            <span data-bs-toggle="modal" data-bs-target="#editartistModal6">
                                                                <button class="btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Edit"><i class="bx bx-edit"></i></button></span>
                                                            <form action="https://dash.yekbun.net/artist/6" onsubmit="confirmAction(event, () => event.target.submit())" method="post" class="d-inline">
                                <input type="hidden" name="_method" value="DELETE">                                <input type="hidden" name="_token" value="vZWRWLao4mkM3TaLxw8oI60YJ7wrJHownfBORslo">                                                                <button type="submit" class="btn btn-sm btn-icon" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Remove"><i class="bx bx-trash me-1"></i></button>
                                                            </form>

                            <div class="modal fade modal-659be5a0790de" id="editartistModal6" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class=" w-100">
                    <h4 class="modal-title" id="modalCenterTitle">Edit Artist</h4>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <style>
    .edit-form .dropzone {
        display: flex;
        flex-wrap: wrap;
    }

    .edit-form .dropzone .dz-message {
        width: 100%;
    }
</style>

<form id="editForm6" class="edit-form" method="POST" action="https://dash.yekbun.net/artist/6" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="vZWRWLao4mkM3TaLxw8oI60YJ7wrJHownfBORslo">    <input type="hidden" name="_method" value="PUT">    <div class="hidden-inputs">
        <input type="hidden" name="image" value="music/64fdae5193f8e___ciwan_haco.jpeg" data-path="music/64fdae5193f8e___ciwan_haco.jpeg">
    </div>
    <div class="row">
        <div class="col-lg-12 mx-auto">

            <div class="row g-3">

                <div class="col-md-12">
                    <label class="form-label" for="fullname">Gender</label>
                    <select name="gender" class="form-select">
                        <option>Select Gender</option>
                                                    <option value="male" selected="">Male</option>
                            <option value="female">Female</option>
                                            </select>
                </div>

                <div class="col-md-12">
                    <label class="form-label" for="fullname">First Name</label>
                    <input type="text" id="fullname" class="form-control" placeholder="lorem" name="first_name" value="Çiwan">
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="fullname">Last Name</label>
                    <input type="text" id="fullname" class="form-control" placeholder="lorem" name="last_name" value="Haco">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="fullname">Province</label>
                    <select name="province" class="form-control province_id" id="province_id" data-url="https://dash.yekbun.net/get/city" value="" data-selected="74">
                        <option value="">Select province</option>
                                                <option value="1">Bakur</option>
                                                <option value="2">Başûr</option>
                                                <option value="3" selected="">Rojava</option>
                                                <option value="4">Rojhilat</option>
                                            </select>
                </div>
                <div class="col-md-8">
                    <label class="form-label" for="fullname">City</label>
                    <select name="city" class="form-control city_id" id="city_id"><option value="69">Amûd</option><option value="70">Heseke (Hesîçe)</option><option value="71">Kobanî</option><option value="72">Qamîşlo</option><option value="73">Reqa</option><option value="74" selected="">Rimêlan</option><option value="75">Serê Kanîyê</option><option value="76">Efrîn</option><option value="77">Girê Spî</option><option value="78">Hecîn</option><option value="79">Şehba</option></select>
                </div>
                
                <div class="col-12">
                    <div class="card">
                        <h5 class="card-header">Image</h5>
                        <div class="card-body">
                            <div class="dropzone needsclick dz-clickable dz-started" action="/" id="dropzone-img6">
                                <div class="dz-message needsclick">
                                    Drop files here or click to upload
                                </div>
                                
                            <div class="row dz-image-preview" data-path="music/64fdae5193f8e___ciwan_haco.jpeg">                                            <div class="col-md-12 col-12 d-flex justify-content-center">                                                <div class="dz-preview dz-file-preview w-100">                                                    <div class="dz-details">                                                        <div class="dz-thumbnail" style="width:95%">                                                            <img data-dz-thumbnail="" alt="ciwan_haco.jpeg" src="https://dash.yekbun.net/storage/music/64fdae5193f8e___ciwan_haco.jpeg">                                                            <span class="dz-nopreview">No preview</span>                                                            <div class="dz-success-mark"></div>                                                            <div class="dz-error-mark"></div>                                                            <div class="dz-error-message"><span data-dz-errormessage=""></span></div>                                                                                                                  </div>                                                        <div class="dz-filename" data-dz-name="">ciwan_haco.jpeg</div>                                                            <div class="dz-size" data-dz-size=""><strong>4.8</strong> KB</div>                                                                                                        </div>                                                </div>                                            </div>                                        <a class="dz-remove" href="javascript:undefined;" data-dz-remove="">Remove file</a></div></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <label class="form-label" for="status">Status</label>
                    <select class="form-select" name="status">
                        <option selected="" value="">Select</option>
                        <option value="1" selected="">Publish</option>
                        <option value="0">UnPublish</option>
  
                    </select>

                </div>
            </div>
        </div>
    </div>
</form>


<script>
    'use strict';


    //  <div class="progress">
        // <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div>
        //                                                     </div>

    dropZoneInitFunctions.push(function() {
        // previewTemplate: Updated Dropzone default previewTemplate

        const previewTemplate = `<div class="row">
                                            <div class="col-md-12 col-12 d-flex justify-content-center">
                                                <div class="dz-preview dz-file-preview w-100">
                                                    <div class="dz-details">
                                                        <div class="dz-thumbnail" style="width:95%">
                                                            <img data-dz-thumbnail >
                                                            <span class="dz-nopreview">No preview</span>
                                                            <div class="dz-success-mark"></div>
                                                            <div class="dz-error-mark"></div>
                                                            <div class="dz-error-message"><span data-dz-errormessage></span></div>
                                                          
                                                        </div>
                                                        <div class="dz-filename" data-dz-name></div>
                                                            <div class="dz-size" data-dz-size></div>
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`;

        // image
        const dropzoneMulti1 = new Dropzone('#dropzone-img6', {
            url: 'https://dash.yekbun.net/file/upload',
            previewTemplate: previewTemplate,
            parallelUploads: 1,
            maxFilesize: 100,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': 'vZWRWLao4mkM3TaLxw8oI60YJ7wrJHownfBORslo'
            },
            sending: function(file, xhr, formData) {
                formData.append('folder', 'music');
            },
            success: function(file, response) {

                if (file.previewElement) {
                    file.previewElement.classList.add("dz-success");
                }
                file.previewElement.dataset.path = response.path;
                const hiddenInputsContainer = file.previewElement.closest('form').querySelector(
                    '.hidden-inputs');
                hiddenInputsContainer.innerHTML +=
                    `<input type="hidden" name="image" value="${response.path}" data-path="${response.path}">`;

            },
            removedfile: function(file) {
                const hiddenInputsContainer = file.previewElement.closest('form').querySelector(
                    '.hidden-inputs');
                hiddenInputsContainer.querySelector(
                    `input[data-path="${file.previewElement.dataset.path}"]`).remove();

                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }

                $.ajax({
                    url: 'https://dash.yekbun.net/artists/6/image',
                    method: 'delete',
                    headers: {
                        'X-CSRF-TOKEN': 'vZWRWLao4mkM3TaLxw8oI60YJ7wrJHownfBORslo'
                    },
                    data: {
                        path: file.previewElement.dataset.path
                    },
                    success: function() {}
                });

                return this._updateMaxFilesReachedClass();
            }
        });

                $("document").ready(() => {
            var path = "https://dash.yekbun.net/storage/music/64fdae5193f8e___ciwan_haco.jpeg";
            var rpath = "music/64fdae5193f8e___ciwan_haco.jpeg";
            const parts = rpath.split("___");

            imageUrlToFile(path,parts).then((file) => {
                file['status'] = "success";
                file['previewElement'] = "div.dz-preview.dz-image-preview";
                file['previewTemplate'] = "div.dz-preview.dz-image-preview";
                file['_removeLink'] = "a.dz-remove";
                // file['webkitRelativePath'] = "";
                file['width'] = 500;
                file['height'] = 500;
                file['accepted'] = true;
                file['dataURL'] = path;
                file['processing'] = true;
                file['addPathToDataset'] = true;
                dropzoneMulti1.on('addedfile', function(file) {
                    if (file.addPathToDataset)
                        file.previewElement.dataset.path = rpath;
                });
                file['upload'] = {
                    bytesSent: 0,
                    progress: 0,
                };

                // Update the preview template to include the music title

                dropzoneMulti1.emit("addedfile", file, path);
                dropzoneMulti1.emit("thumbnail", file, path);
                // dropzoneMulti1.files.push(file);
            });
        });
            })
</script>

<script>
    async function imageUrlToFile(imageUrl, fileName) {
        // Fetch the image
        const response = await fetch(imageUrl);
        const blob = await response.blob();

        // Create a File object
        const file = new File([blob], fileName[1], { type: blob.type });

        return file;
    }
</script>
            </div>
                        <div class="modal-footer">
                                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" form="editForm6" class="btn btn-primary" onclick="">Update</button>
                                                </div>
                    </div>
    </div>
</div>

                        </div>
                    </td>
                </tr>
                                <tr>
                    <td>3</td>
                    <td>
                        <div class="d-flex justify-content-start align-items-center user-name">
                            <div class="avatar-wrapper">
                                <div class="avatar avatar-sm me-3"><img src="https://dash.yekbun.net/storage/music/64fdae742c5f8___Ahmet_Kaya.jpeg" alt="Avatar" class="rounded-circle"></div>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="javascript:void(0)" class="text-body text-truncate">
                                    <span class="fw-semibold">Ahmet Kaya</span>
                                </a>
                                <!-- <small class="text-muted">Kaya</small> -->
                            </div>
                        </div>
                    </td>
                    <td>male</td>
                    <td>
                        <div class="d-flex justify-content-start align-items-center">
                            <span data-bs-toggle="modal" data-bs-target="#editartistModal7">
                                                                <button class="btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Edit"><i class="bx bx-edit"></i></button></span>
                                                            <form action="https://dash.yekbun.net/artist/7" onsubmit="confirmAction(event, () => event.target.submit())" method="post" class="d-inline">
                                <input type="hidden" name="_method" value="DELETE">                                <input type="hidden" name="_token" value="vZWRWLao4mkM3TaLxw8oI60YJ7wrJHownfBORslo">                                                                <button type="submit" class="btn btn-sm btn-icon" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Remove"><i class="bx bx-trash me-1"></i></button>
                                                            </form>

                            <div class="modal fade modal-659be5a0793db" id="editartistModal7" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class=" w-100">
                    <h4 class="modal-title" id="modalCenterTitle">Edit Artist</h4>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <style>
    .edit-form .dropzone {
        display: flex;
        flex-wrap: wrap;
    }

    .edit-form .dropzone .dz-message {
        width: 100%;
    }
</style>

<form id="editForm7" class="edit-form" method="POST" action="https://dash.yekbun.net/artist/7" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="vZWRWLao4mkM3TaLxw8oI60YJ7wrJHownfBORslo">    <input type="hidden" name="_method" value="PUT">    <div class="hidden-inputs">
        <input type="hidden" name="image" value="music/64fdae742c5f8___Ahmet_Kaya.jpeg" data-path="music/64fdae742c5f8___Ahmet_Kaya.jpeg">
    </div>
    <div class="row">
        <div class="col-lg-12 mx-auto">

            <div class="row g-3">

                <div class="col-md-12">
                    <label class="form-label" for="fullname">Gender</label>
                    <select name="gender" class="form-select">
                        <option>Select Gender</option>
                                                    <option value="male" selected="">Male</option>
                            <option value="female">Female</option>
                                            </select>
                </div>

                <div class="col-md-12">
                    <label class="form-label" for="fullname">First Name</label>
                    <input type="text" id="fullname" class="form-control" placeholder="lorem" name="first_name" value="Ahmet">
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="fullname">Last Name</label>
                    <input type="text" id="fullname" class="form-control" placeholder="lorem" name="last_name" value="Kaya">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="fullname">Province</label>
                    <select name="province" class="form-control province_id" id="province_id" data-url="https://dash.yekbun.net/get/city" value="" data-selected="59">
                        <option value="">Select province</option>
                                                <option value="1">Bakur</option>
                                                <option value="2" selected="">Başûr</option>
                                                <option value="3">Rojava</option>
                                                <option value="4">Rojhilat</option>
                                            </select>
                </div>
                <div class="col-md-8">
                    <label class="form-label" for="fullname">City</label>
                    <select name="city" class="form-control city_id" id="city_id"><option value="58">Akrê</option><option value="59" selected="">Amêdî</option><option value="60">Axçeler</option><option value="61">Baedrê</option><option value="62">Baej</option><option value="63">Bamernê</option><option value="64">Helebçe</option><option value="65">Hewlêr</option><option value="66">Selahedîn</option><option value="67">Zaxo</option><option value="68">Şingal</option></select>
                </div>
                
                <div class="col-12">
                    <div class="card">
                        <h5 class="card-header">Image</h5>
                        <div class="card-body">
                            <div class="dropzone needsclick dz-clickable dz-started" action="/" id="dropzone-img7">
                                <div class="dz-message needsclick">
                                    Drop files here or click to upload
                                </div>
                                
                            <div class="row dz-image-preview" data-path="music/64fdae742c5f8___Ahmet_Kaya.jpeg">                                            <div class="col-md-12 col-12 d-flex justify-content-center">                                                <div class="dz-preview dz-file-preview w-100">                                                    <div class="dz-details">                                                        <div class="dz-thumbnail" style="width:95%">                                                            <img data-dz-thumbnail="" alt="Ahmet_Kaya.jpeg" src="https://dash.yekbun.net/storage/music/64fdae742c5f8___Ahmet_Kaya.jpeg">                                                            <span class="dz-nopreview">No preview</span>                                                            <div class="dz-success-mark"></div>                                                            <div class="dz-error-mark"></div>                                                            <div class="dz-error-message"><span data-dz-errormessage=""></span></div>                                                                                                                  </div>                                                        <div class="dz-filename" data-dz-name="">Ahmet_Kaya.jpeg</div>                                                            <div class="dz-size" data-dz-size=""><strong>5.6</strong> KB</div>                                                                                                        </div>                                                </div>                                            </div>                                        <a class="dz-remove" href="javascript:undefined;" data-dz-remove="">Remove file</a></div></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <label class="form-label" for="status">Status</label>
                    <select class="form-select" name="status">
                        <option selected="" value="">Select</option>
                        <option value="1">Publish</option>
                        <option value="0" selected="">UnPublish</option>
  
                    </select>

                </div>
            </div>
        </div>
    </div>
</form>


<script>
    'use strict';


    //  <div class="progress">
        // <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div>
        //                                                     </div>

    dropZoneInitFunctions.push(function() {
        // previewTemplate: Updated Dropzone default previewTemplate

        const previewTemplate = `<div class="row">
                                            <div class="col-md-12 col-12 d-flex justify-content-center">
                                                <div class="dz-preview dz-file-preview w-100">
                                                    <div class="dz-details">
                                                        <div class="dz-thumbnail" style="width:95%">
                                                            <img data-dz-thumbnail >
                                                            <span class="dz-nopreview">No preview</span>
                                                            <div class="dz-success-mark"></div>
                                                            <div class="dz-error-mark"></div>
                                                            <div class="dz-error-message"><span data-dz-errormessage></span></div>
                                                          
                                                        </div>
                                                        <div class="dz-filename" data-dz-name></div>
                                                            <div class="dz-size" data-dz-size></div>
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`;

        // image
        const dropzoneMulti1 = new Dropzone('#dropzone-img7', {
            url: 'https://dash.yekbun.net/file/upload',
            previewTemplate: previewTemplate,
            parallelUploads: 1,
            maxFilesize: 100,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': 'vZWRWLao4mkM3TaLxw8oI60YJ7wrJHownfBORslo'
            },
            sending: function(file, xhr, formData) {
                formData.append('folder', 'music');
            },
            success: function(file, response) {

                if (file.previewElement) {
                    file.previewElement.classList.add("dz-success");
                }
                file.previewElement.dataset.path = response.path;
                const hiddenInputsContainer = file.previewElement.closest('form').querySelector(
                    '.hidden-inputs');
                hiddenInputsContainer.innerHTML +=
                    `<input type="hidden" name="image" value="${response.path}" data-path="${response.path}">`;

            },
            removedfile: function(file) {
                const hiddenInputsContainer = file.previewElement.closest('form').querySelector(
                    '.hidden-inputs');
                hiddenInputsContainer.querySelector(
                    `input[data-path="${file.previewElement.dataset.path}"]`).remove();

                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }

                $.ajax({
                    url: 'https://dash.yekbun.net/artists/7/image',
                    method: 'delete',
                    headers: {
                        'X-CSRF-TOKEN': 'vZWRWLao4mkM3TaLxw8oI60YJ7wrJHownfBORslo'
                    },
                    data: {
                        path: file.previewElement.dataset.path
                    },
                    success: function() {}
                });

                return this._updateMaxFilesReachedClass();
            }
        });

                $("document").ready(() => {
            var path = "https://dash.yekbun.net/storage/music/64fdae742c5f8___Ahmet_Kaya.jpeg";
            var rpath = "music/64fdae742c5f8___Ahmet_Kaya.jpeg";
            const parts = rpath.split("___");

            imageUrlToFile(path,parts).then((file) => {
                file['status'] = "success";
                file['previewElement'] = "div.dz-preview.dz-image-preview";
                file['previewTemplate'] = "div.dz-preview.dz-image-preview";
                file['_removeLink'] = "a.dz-remove";
                // file['webkitRelativePath'] = "";
                file['width'] = 500;
                file['height'] = 500;
                file['accepted'] = true;
                file['dataURL'] = path;
                file['processing'] = true;
                file['addPathToDataset'] = true;
                dropzoneMulti1.on('addedfile', function(file) {
                    if (file.addPathToDataset)
                        file.previewElement.dataset.path = rpath;
                });
                file['upload'] = {
                    bytesSent: 0,
                    progress: 0,
                };

                // Update the preview template to include the music title

                dropzoneMulti1.emit("addedfile", file, path);
                dropzoneMulti1.emit("thumbnail", file, path);
                // dropzoneMulti1.files.push(file);
            });
        });
            })
</script>

<script>
    async function imageUrlToFile(imageUrl, fileName) {
        // Fetch the image
        const response = await fetch(imageUrl);
        const blob = await response.blob();

        // Create a File object
        const file = new File([blob], fileName[1], { type: blob.type });

        return file;
    }
</script>
            </div>
                        <div class="modal-footer">
                                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" form="editForm7" class="btn btn-primary" onclick="">Update</button>
                                                </div>
                    </div>
    </div>
</div>

                        </div>
                    </td>
                </tr>
                                            </tbody>
        </table>
    </div>
</div>

<script>
    function delete_service(el) {
        let link = $(el).data('id');
        $('.deleted-modal').modal('show');
        $('#delete_form').attr('action', link);
    }

</script>
<x-modal id="createartistModal" title="Create Artist" saveBtnText="Create" saveBtnType="submit" saveBtnForm="createForm" size="md">
    @include('content.include.artist.createForm')
</x-modal>
@section('page-script')
<script>
    function confirmAction(event, callback) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?'
            , text: "Are you sure you want to delete this?"
            , icon: 'warning'
            , showCancelButton: true
            , confirmButtonText: 'Yes, delete it!'
            , customClass: {
                confirmButton: 'btn btn-danger me-3'
                , cancelButton: 'btn btn-label-secondary'
            }
            , buttonsStyling: false
        }).then(function(result) {
            if (result.value) {
                callback();
            }
        });
    }

</script>

<script>
     $('.province_id').change(function() {
        let url = $(this).data('url');
        let id = $(this).val();
        const self = this;

        $.ajax({
            type: 'get'
            , url: url + '/' + id
            , success: function(response) {
                const cityIdEl = $(self).closest('form').find('.city_id');
                cityIdEl.html('');
                $.each(response, function(index, value) {
                    console.log(index, value);
                    cityIdEl.append('<option value="' + value.id + '">' + value.name + '</option>')
                })
            }
        })

    });

    $(document).ready(function () {
        $('.edit-form .province_id').each(function(index, provinceEl) {
            let url = $(provinceEl).data('url');
            let id = $(provinceEl).val();
            let selected = $(provinceEl).data('selected');

            $.ajax({
                type: 'get'
                , url: url + '/' + id
                , success: function(response) {
                    const cityIdEl = $(provinceEl).closest('form').find('.city_id');
                    cityIdEl.html('');
                    $.each(response, function(index, value) {
                        cityIdEl.append('<option value="' + value.id + '" '+(value.id==selected?'selected':'')+'>' + value.name + '</option>')
                    })
                }
            })

        });
    });
    // $('.province_id').change(function() {
    //     let url = $(this).data('url');
    //     let id = $(this).val();
    //     console.log(url);
    //     console.log(id);
    //     $.ajax({
    //         type: 'get'
    //         , url: url + '/' + id
    //         , success: function(response) {
    //             $('#city_id').html('')
    //             $.each(response, function(index, value) {
    //                 console.log(index, value);
    //                 $('#city_id').append('<option value="' + value.id + '">' + value.name + '</option>')
    //             })
    //         }
    //     })

    // });

</script>
<script>
    function drpzone_init() {
        dropZoneInitFunctions.forEach(callback => callback());
    }
  </script>
  <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js" onload="drpzone_init()"></script>
@endsection
@endsection
