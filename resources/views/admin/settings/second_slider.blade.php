@extends('admin.layouts.main')

@section('style')

@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                Тести "4х1"-и фанҳо
                            </div>
                            <div class="card-body">
                            </div>
                            <div id="test-data"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var loader = `
            <p class="alert alert-info text-center h1"> loader </p>
        `;
        var slideData;
        var sectionData = {
            "description": "",
            "btn_text": "",
            "btn_url": ""
        };
        var images;
        var setting_id;

        function setSlides(slides) {
            var domObject = '<div class="container" >';
            if (slides.length <= 0) {
                slides.push({
                    "index": 1,
                    "url": "",
                    "img_src": "",
                    "title": "",
                    "bg_color": "",
                    "is_show": true
                })
            }
            domObject += `<div id="quizContainer">`;
            domObject += `
                <div>
                    <div class="form-group row">
                        <label for="description" class="col-4 col-form-label">Манти асосӣ :</label>
                        <div class="col-8">
                          <textarea id="description" rows="5" name="description" placeholder="Маълумотро ворид намоед"  class="form-control">${sectionData.description}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="btn_text" class="col-4 col-form-label">Манти тугмача :</label>
                        <div class="col-8">
                          <input id="btn_text" name="btn_text" value="${sectionData.btn_text}" placeholder="Индекси слайдро ворид намоед" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="btn_url" class="col-4 col-form-label">URL тугмача :</label>
                        <div class="col-8">
                          <input id="btn_url" name="btn_url" value="${sectionData.btn_url}" placeholder="Индекси слайдро ворид намоед" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <h5 class="mt-3"> Маълумоти ҳар як слайдерро ворид намоед. </h5>
            `;
            slides.forEach(function (slide, i) {
                var imgNode = ``;
                if ($.trim(slide.img_src) !== "") {
                    imgNode = `
                    <div class="w-50 mb-2">
                        <img class="w-75 images" src="${slide.img_src}" alt="${slide.title}">
                    </div>`
                }
                domObject += `
                    <div class="border border-info p-3 mt-3 slideList" id="quiz${i}">
                      <div class="d-flex justify-content-between mb-1 align-items-baseline">
                          <label for="q${i}">Маълумоти слайдери ${i + 1}-ро ворид созед :</label>
                          <button type="button" class="btn btn-danger" onclick="removeQuiz(${i})">X</button>
                      </div>
                      <div class="form-group row">
                        <label for="index${i}" class="col-4 col-form-label">Индекс :</label>
                        <div class="col-8">
                          <input id="index${i}" name="index" value="${slide.index}" placeholder="Индекси слайдро ворид намоед" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="title${i}" class="col-4 col-form-label">Сарлавҳа :</label>
                        <div class="col-8">
                          <input id="title${i}" name="title" value="${slide.title}" placeholder="Сарлавҳаро ворид намоед" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="url${i}" class="col-4 col-form-label">URL-и слайдер :</label>
                        <div class="col-8">
                          <input id="url${i}"  name="url" value="${slide.url}" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="bg_color${i}" class="col-4 col-form-label">Ранги фон :</label>
                        <div class="col-8">
                          <input id="bg_color${i}"  name="bg_color" value="${slide.bg_color}" type="color" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleFormControlFile${i}" class="col-4 col-form-label">Акс :</label>
                        <div class="col-8">
                            ${imgNode}
                            <input type="file"  onchange="changeImage(event,${i})" class="form-control-file" id="exampleFormControlFile${i}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="is_show${i}" class="col-4 col-form-label">Вазъият :</label>
                        <div class="col-8">
                          <select id="is_show${i}" name="is_show" class="custom-select">
                            <option ${slide.is_show === '1' ? 'selected' : ''} value="1">Нишон дода шавад</option>
                            <option ${slide.is_show === '1' ? '' : 'selected'} value="0">Нишон дода нашавад</option>
                          </select>
                        </div>
                      </div>
                    </div>
                `
            });
            domObject += `</div>`; // #quizContainer

            domObject += `<div class="d-flex align-items-baseline justify-content-between my-3">
                <button type="button" class="btn btn-info" onclick="addQuiz()"> ADD</button>
                <button type="button" class="btn btn-success" onclick="saveQuizzes()">Save</button>
            </div>`;

            domObject += '</div>'; // container

            $('#test-data').html(domObject);

            images = $('.images');

        }

        function saveQuizzes() {
            var data = [];
            $('.slideList').each(function (quizIndex) {
                var obj = {
                    "index": $(this).find('[name=index]').val(),
                    "url": $(this).find('[name=url]').val(),
                    "title": $(this).find('[name=title]').val(),
                    "img_src": $(this).find('.images').attr('src'),
                    "bg_color": $(this).find('[name=bg_color]').val(),
                    "is_show": $(this).find('[name=is_show]').val()
                };
                data.push(obj)
            });
            console.log($('[name=description]').val());
            $.ajax({
                url: "/admin/settings/" + setting_id,
                type: 'PUT',
                dataType: "JSON",
                data: {
                    "data": {
                        description: $('textarea[name=description]').val(),
                        btn_text: $('[name=btn_url]').val(),
                        btn_url: $('[name=btn_text]').val(),
                        slides: data
                    },
                    "_method": 'PUT',
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (response) {
                    if (response.status == 'ok') {
                        swal({
                            title: "Мавод тағйир дода шуд!",
                            text: "Синфии интихобшуда бо муваффақият нобуд шуд",
                            icon: "success",
                            button: "ОК!",
                        });
                    } else {
                        swal({
                            title: "Хатогӣ!",
                            text: "Дар иҷрои амалиёт хатогӣ рӯй дод",
                            icon: "danger",
                            button: "OK",
                        });
                    }
                },
                error: function (error) {
                    swal({
                        title: "Хатогӣ!",
                        text: "Дар иҷрои амалиёт хатогӣ рӯй дод",
                        icon: "danger",
                        button: "OK",
                    });
                }
            })
        }

        function removeQuiz(index) {
            $(`#quiz${index}`).remove()
            images = $('.images');

        }

        function changeImage(e, i) {
            if (e.target.files.length > 0) {
                var reader = new FileReader();
                reader.readAsDataURL(e.target.files[0]);

                reader.onload = function () {
                    images[i].src = reader.result
                };

                reader.onerror = function (error) {
                    console.log('Error: ', error);
                };
            }
        }

        function addQuiz() {
            var domObject = '';
            var i = $('.slideList').length;
            domObject += `
                    <div class="border border-info p-3 mt-3 slideList" id="quiz${i}">
                      <div class="d-flex justify-content-between mb-1 align-items-baseline">
                          <label for="q${i}">Маълумоти слайдерро ворид созед :</label>
                          <button type="button" class="btn btn-danger" onclick="removeQuiz(${i})">X</button>
                      </div>
                      <div class="form-group row">
                        <label for="index${i}" class="col-4 col-form-label">Индекс :</label>
                        <div class="col-8">
                          <input id="index${i}" name="index" value="" placeholder="Индекси слайдро ворид намоед" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="title${i}" class="col-4 col-form-label">Сарлавҳа :</label>
                        <div class="col-8">
                          <input id="title${i}" name="title" value="" placeholder="Сарлавҳаро ворид намоед" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="url${i}" class="col-4 col-form-label">URL-и слайдер :</label>
                        <div class="col-8">
                          <input id="url${i}"  name="url" value="" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="bg_color${i}" class="col-4 col-form-label">Ранги фон :</label>
                        <div class="col-8">
                          <input id="bg_color${i}"  name="bg_color" value="" type="color" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleFormControlFile${i}" class="col-4 col-form-label">Акс :</label>
                        <div class="col-8">
                            <div class="w-50 mb-2">
                        <img class="w-75 images" src="" >
                    </div>
                            <input type="file"  onchange="changeImage(event,${i})" class="form-control-file" id="exampleFormControlFile${i}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="is_show${i}" class="col-4 col-form-label">Вазъият :</label>
                        <div class="col-8">
                          <select id="is_show${i}" name="is_show" class="custom-select">
                            <option  value="1">Нишон дода шавад</option>
                            <option  value="0">Нишон дода нашавад</option>
                          </select>
                        </div>
                      </div>
                    </div>
                `
            $('#quizContainer').append(domObject);

            images = $('.images');

        }

        $(document).ready(function () {
            $.ajax('/admin/settings/second_slider')
                .done(function (res) {
                    setting_id = res.id;
                    var data = JSON.parse(res.value);

                    slideData = data.slides;

                    sectionData.description = data.description;
                    sectionData.btn_text = data.btn_text;
                    sectionData.btn_url = data.btn_url;
                    $('#quizTitle').show();
                    setSlides(slideData)
                });
        })
    </script>
@endsection
