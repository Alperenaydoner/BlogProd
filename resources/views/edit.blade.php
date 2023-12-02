{{ view('layouts.header') }}
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card mb-5">
                    <div class="card-header">
                        <h3 class="card-title">Edit user Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 p-md-5 p-sm-4 p-3">
                                <form action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{-- Personal user --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="fw-bold text-secondary">Personal user</h2>
                                            <div class="form-outline mb-4">
                                                <input type="hidden" id="user_id" name="user_id" class="form-control"
                                                    value="{{ isset($user['id']) ? $user['id'] : '' }}" />
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-12">
                                                            <div class="col-12">
                                                                <div class="form-outline mb-4">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">First
                                                                        name</label>
                                                                    <input type="text" id="first_name"
                                                                        name="first_name" placeholder="First name"
                                                                        class="form-control"
                                                                        value="{{ isset($user['first_name']) ? $user['first_name'] : '' }}" />
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Last
                                                                        name</label>
                                                                    <input type="text" id="last_name"
                                                                        name="last_name" placeholder="Last name"
                                                                        class="form-control"
                                                                        value="{{ isset($user['last_name']) ? $user['last_name'] : '' }}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-12">
                                                            <div class="profile_picture text-center">
                                                                <input type="file" name="image_path"
                                                                    accept="image/png, image/jpeg, image/jpg"
                                                                    onchange="display_image(this);"
                                                                    class="d-none upload-box-image">
                                                                <img class="box-image-preview img-fluid img-circle elevation-2"
                                                                    src="{{ isset($user['image_path']) && !empty($user['image_path']) ? asset('assets/images/' . $user['image_path']) : asset('assets/images/user-thumb.jpg') }}"
                                                                    alt="Profile picture"
                                                                    onclick="$(this).closest('.profile_picture').find('input').click();"
                                                                    style="height:150px; width:150px;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label fw-bold text-secondary">Profile
                                                    Title</label>
                                                <input type="text" id="profile_title" name="profile_title"
                                                    class="form-control" placeholder="Profile Title"
                                                    value="{{ isset($user['profile_title']) ? $user['profile_title'] : '' }}" />
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label fw-bold text-secondary">About</label>
                                                <textarea class="form-control" placeholder="Descripton" id="about_me" name="about_me" rows="4">{{ isset($user['about_me']) ? $user['about_me'] : '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Contact user --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="fw-bold text-secondary">Contact user</h2>
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Email</label>
                                                                    <input type="email" id="email"
                                                                        name="email" placeholder="Email"
                                                                        class="form-control"
                                                                        value="{{ isset($user['email']) ? $user['email'] : '' }}" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Phone
                                                                        number</label>
                                                                    <input type="number" id="phone_number"
                                                                        name="phone_number" placeholder="Phone Number"
                                                                        class="form-control"
                                                                        value="{{ isset($user['phone_number']) ? $user['phone_number'] : '' }}" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Website</label>
                                                                    <input type="url" id="website"
                                                                        name="website" class="form-control"
                                                                        placeholder="Website"
                                                                        value="{{ isset($user['website']) ? $user['website'] : '' }}" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">LinkedIn</label>
                                                                    <input type="url" id="linkedin_link"
                                                                        name="linkedin_link" class="form-control"
                                                                        placeholder="LinkedIn"
                                                                        value="{{ isset($user['linkedin_link']) ? $user['linkedin_link'] : '' }}" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Github</label>
                                                                    <input type="url" id="github_link"
                                                                        name="github_link" class="form-control"
                                                                        placeholder="Github"
                                                                        value="{{ isset($user['github_link']) ? $user['github_link'] : '' }}" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Twitter</label>
                                                                    <input type="text" id="twitter"
                                                                        name="twitter" class="form-control"
                                                                        placeholder="Twitter"
                                                                        value="{{ isset($user['twitter']) ? $user['twitter'] : '' }}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>

                                    {{-- Education --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h2 class="fw-bold text-secondary">Education</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-primary" id="add_education">Add
                                                        Education</button>
                                                </div>
                                            </div>
                                            <section class="education_section">
                                            @if(isset($user['education']))
                                                @foreach ($user['education'] as $edu_info)
                                                    <div class="card mb-4">
                                                        <div class="card-body">
                                                            <span onclick="remove_section(this)"
                                                                class="position-absolute"
                                                                style="top: 10px; right: 15px; cursor: pointer;"><i
                                                                    class="fa fa-close"></i></span>
                                                            <div class="form-outline mb-4">
                                                                <label
                                                                    class="form-label fw-bold text-secondary">Degree</label>
                                                                <input type="text" id="degree_title"
                                                                    name="degree_title[]" class="form-control"
                                                                    placeholder="Degree"
                                                                    value="{{ isset($edu_info['degree_title']) ? $edu_info['degree_title'] : '' }}" />
                                                            </div>
                                                            <div class="form-outline mb-4">
                                                                <label
                                                                    class="form-label fw-bold text-secondary">Institute</label>
                                                                <input type="text" id="institute"
                                                                    name="institute[]" class="form-control"
                                                                    placeholder="Institute"
                                                                    value="{{ isset($edu_info['institute']) ? $edu_info['institute'] : '' }}" />
                                                            </div>
                                                            <div class="row mb-4">
                                                                <div class="col-sm-6 col-12">
                                                                    <div class="form-outline">
                                                                        <label
                                                                            class="form-label fw-bold text-secondary">Start
                                                                            Date</label>
                                                                        <input type="date" id="edu_start_date"
                                                                            name="edu_start_date[]"
                                                                            class="form-control"
                                                                            value="{{ isset($edu_info['edu_start_date']) ? $edu_info['edu_start_date'] : '' }}" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-12">
                                                                    <div class="form-outline">
                                                                        <label
                                                                            class="form-label fw-bold text-secondary">End
                                                                            Date</label>
                                                                        <input type="date" id="edu_end_date"
                                                                            name="edu_end_date[]" class="form-control"
                                                                            value="{{ isset($edu_info['edu_end_date']) ? $edu_info['edu_end_date'] : '' }}" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-outline mb-4">
                                                                <label
                                                                    class="form-label fw-bold text-secondary">Description</label>
                                                                <textarea class="form-control" placeholder="Descripton" id="education_description" name="education_description[]"
                                                                    rows="4">{{ isset($edu_info['education_description']) ? $edu_info['education_description'] : '' }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                @endif
                                            </section>
                                        </div>
                                    </div>

                                    {{-- Experiencce --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h2 class="fw-bold text-secondary">Experience</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-primary" id="add_experience">Add
                                                        Experience</button>
                                                </div>
                                            </div>
                                            <section class="experience_section">
                                            @if(isset($user['experience']))
                                                @foreach ($user['experience'] as $exp_info)
                                                    <div class="card mb-4">
                                                        <div class="card-body">
                                                            <span onclick="remove_section(this)"
                                                                class="position-absolute"
                                                                style="top: 10px; right: 15px; cursor: pointer;"><i
                                                                    class="fa fa-close"></i></span>
                                                            <div class="form-outline mb-4">
                                                                <label class="form-label fw-bold text-secondary">Job
                                                                    Title</label>
                                                                <input type="text" id="job_title"
                                                                    name="job_title[]" class="form-control"
                                                                    placeholder="Job Title"
                                                                    value="{{ isset($exp_info['job_title']) ? $exp_info['job_title'] : '' }}" />
                                                            </div>
                                                            <div class="form-outline mb-4">
                                                                <label
                                                                    class="form-label fw-bold text-secondary">Organization</label>
                                                                <input type="text" id="organization"
                                                                    name="organization[]" class="form-control"
                                                                    placeholder="Organization"
                                                                    value="{{ isset($exp_info['organization']) ? $exp_info['organization'] : '' }}" />
                                                            </div>
                                                            <div class="row mb-4">
                                                                <div class="col-sm-6 col-12">
                                                                    <div class="form-outline">
                                                                        <label
                                                                            class="form-label fw-bold text-secondary">Start
                                                                            Date</label>
                                                                        <input type="date" id="job_start_date"
                                                                            name="job_start_date[]"
                                                                            class="form-control"
                                                                            value="{{ isset($exp_info['job_start_date']) ? $exp_info['job_start_date'] : '' }}" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-12">
                                                                    <div class="form-outline">
                                                                        <label
                                                                            class="form-label fw-bold text-secondary">End
                                                                            Date</label>
                                                                        <input type="date" id="job_end_date"
                                                                            name="job_end_date[]" class="form-control"
                                                                            value="{{ isset($exp_info['job_end_date']) ? $exp_info['job_end_date'] : '' }}" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-outline mb-4">
                                                                <label class="form-label fw-bold text-secondary">Job
                                                                    Description</label>
                                                                <textarea class="form-control" placeholder="Job Descripton" id="job_description" name="job_description[]"
                                                                    rows="4">{{ isset($exp_info['job_description']) ? $exp_info['job_description'] : '' }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                @endif
                                            </section>
                                        </div>
                                    </div>

                                    {{-- Projects --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h2 class="fw-bold text-secondary">Projects</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-primary" id="add_project">Add
                                                        Project</button>
                                                </div>
                                            </div>
                                            <section class="project_section">
                                            @if(isset($user['projects']))
                                                @foreach ($user['projects'] as $projects)
                                                    <div class="card mb-4">
                                                        <div class="card-body">
                                                            <span onclick="remove_section(this)"
                                                                class="position-absolute"
                                                                style="top: 10px; right: 15px; cursor: pointer;"><i
                                                                    class="fa fa-close"></i></span>
                                                            <div class="form-outline mb-4">
                                                                <label
                                                                    class="form-label fw-bold text-secondary">Project
                                                                    Title</label>
                                                                <input type="text" id="project_title"
                                                                    name="project_title[]" class="form-control"
                                                                    placeholder="Project Title"
                                                                    value="{{ isset($projects['project_title']) ? $projects['project_title'] : '' }}" />
                                                            </div>
                                                            <div class="form-outline mb-4">
                                                                <label
                                                                    class="form-label fw-bold text-secondary">Project
                                                                    Description</label>
                                                                <textarea class="form-control" placeholder="Project Descripton" id="project_description" name="project_description[]"
                                                                    rows="4">{{ isset($projects['project_description']) ? $projects['project_description'] : '' }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                @endif
                                            </section>
                                        </div>
                                    </div>

                                    {{-- SKILLS & PROFICIENCY --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h2 class="fw-bold text-secondary">Skills & Proficiency</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-primary" id="add_skill">Add
                                                        Skill</button>
                                                </div>
                                            </div>
                                            <section class="skill_section">
                                            @if(isset($user['skills']))
                                                @foreach ($user['skills'] as $skills)
                                                    <div class="card mb-4">
                                                        <div class="card-body">
                                                            <span onclick="remove_section(this)"
                                                                class="position-absolute"
                                                                style="top: 10px; right: 15px; cursor: pointer;"><i
                                                                    class="fa fa-close"></i></span>
                                                            <div class="row">
                                                                <div class="col-10">
                                                                    <div class="form-outline">
                                                                        <label
                                                                            class="form-label fw-bold text-secondary">Add
                                                                            Skill</label>
                                                                        <input type="text" id="skill_name"
                                                                            name="skill_name[]" class="form-control"
                                                                            placeholder="Add Skill"
                                                                            value="{{ isset($skills['skill_name']) ? $skills['skill_name'] : '' }}" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-2">
                                                                    <div class="form-outline">
                                                                        <label
                                                                            class="form-label fw-bold text-secondary">Percentage</label>
                                                                        <div class="input-group">
                                                                            <input type="number" step="5"
                                                                                min="0" max="100"
                                                                                id="skill_percentage"
                                                                                name="skill_percentage[]"
                                                                                placeholder="%" class="form-control"
                                                                                aria-describedby="percentage"
                                                                                value="{{ isset($skills['skill_percentage']) ? $skills['skill_percentage'] : '' }}" />
                                                                            <span class="input-group-text"
                                                                                id="percentage">%</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                @endif
                                            </section>
                                        </div>
                                    </div>

                                    {{-- Languages --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h2 class="fw-bold text-secondary">Languages</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-primary" id="add_language">Add
                                                        Language</button>
                                                </div>
                                            </div>
                                            <section class="language_section">
                                            @if(isset($user['languages']))
                                                @foreach ($user['languages'] as $languages)
                                                    <div class="card mb-4">
                                                        <div class="card-body">
                                                            <span onclick="remove_section(this)"
                                                                class="position-absolute"
                                                                style="top: 10px; right: 15px; cursor: pointer;"><i
                                                                    class="fa fa-close"></i></span>
                                                            <div class="row">
                                                                <div class="col-10">
                                                                    <div class="form-outline">
                                                                        <label
                                                                            class="form-label fw-bold text-secondary">Add
                                                                            langauge</label>
                                                                        <select class="form-control" id="language"
                                                                            name="language[]">
                                                                            <option value="">Add Language
                                                                            </option>
                                                                            <option value="af"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'af' ? 'selected' : '' }}>
                                                                                Afrikaans</option>
                                                                            <option value="sq"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'sq' ? 'selected' : '' }}>
                                                                                Albanian - shqip</option>
                                                                            <option value="am"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'am' ? 'selected' : '' }}>
                                                                                Amharic - አማርኛ</option>
                                                                            <option value="ar"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'ar' ? 'selected' : '' }}>
                                                                                Arabic - العربية</option>
                                                                            <option value="an"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'an' ? 'selected' : '' }}>
                                                                                Aragonese - aragonés</option>
                                                                            <option value="hy"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'hy' ? 'selected' : '' }}>
                                                                                Armenian - հայերեն</option>
                                                                            <option value="ast"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'ast' ? 'selected' : '' }}>
                                                                                Asturian - asturianu</option>
                                                                            <option value="az"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'az' ? 'selected' : '' }}>
                                                                                Azerbaijani - azərbaycan dili</option>
                                                                            <option value="eu"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'eu' ? 'selected' : '' }}>
                                                                                Basque - euskara</option>
                                                                            <option value="be"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'be' ? 'selected' : '' }}>
                                                                                Belarusian - беларуская</option>
                                                                            <option value="bn"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'bn' ? 'selected' : '' }}>
                                                                                Bengali - বাংলা</option>
                                                                            <option value="bs"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'bs' ? 'selected' : '' }}>
                                                                                Bosnian - bosanski</option>
                                                                            <option value="br"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'br' ? 'selected' : '' }}>
                                                                                Breton - brezhoneg</option>
                                                                            <option value="bg"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'bg' ? 'selected' : '' }}>
                                                                                Bulgarian - български</option>
                                                                            <option value="ca"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'ca' ? 'selected' : '' }}>
                                                                                Catalan - català</option>
                                                                            <option value="ckb"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'ckb' ? 'selected' : '' }}>
                                                                                Central Kurdish - کوردی (دەستنوسی
                                                                                عەرەبی)
                                                                            </option>
                                                                            <option value="zh"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'zh' ? 'selected' : '' }}>
                                                                                Chinese - 中文</option>
                                                                            <option value="zh-HK"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'zh-HK' ? 'selected' : '' }}>
                                                                                Chinese (Hong Kong) - 中文（香港）</option>
                                                                            <option value="zh-CN"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'zh-CN' ? 'selected' : '' }}>
                                                                                Chinese (Simplified) - 中文（简体）</option>
                                                                            <option value="zh-TW"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'zn-TW' ? 'selected' : '' }}>
                                                                                Chinese (Traditional) - 中文（繁體）</option>
                                                                            <option value="co"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'co' ? 'selected' : '' }}>
                                                                                Corsican</option>
                                                                            <option value="hr"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'hr' ? 'selected' : '' }}>
                                                                                Croatian - hrvatski</option>
                                                                            <option value="cs"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'cs' ? 'selected' : '' }}>
                                                                                Czech - čeština</option>
                                                                            <option value="da"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'da' ? 'selected' : '' }}>
                                                                                Danish - dansk</option>
                                                                            <option value="nl"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'nl' ? 'selected' : '' }}>
                                                                                Dutch - Nederlands</option>
                                                                            <option value="en"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'en' ? 'selected' : '' }}>
                                                                                English</option>
                                                                            <option value="en-AU"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'en-AU' ? 'selected' : '' }}>
                                                                                English (Australia)</option>
                                                                            <option value="en-CA"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'en-CA' ? 'selected' : '' }}>
                                                                                English (Canada)</option>
                                                                            <option value="en-IN"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'en-IN' ? 'selected' : '' }}>
                                                                                English (India)</option>
                                                                            <option value="en-NZ"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'en-NZ' ? 'selected' : '' }}>
                                                                                English (New Zealand)</option>
                                                                            <option value="en-ZA"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'en-ZA' ? 'selected' : '' }}>
                                                                                English (South Africa)</option>
                                                                            <option value="en-GB"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'en-GB' ? 'selected' : '' }}>
                                                                                English (United Kingdom)</option>
                                                                            <option value="en-US"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'en-US' ? 'selected' : '' }}>
                                                                                English (United States)</option>
                                                                            <option value="eo"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'eo' ? 'selected' : '' }}>
                                                                                Esperanto - esperanto</option>
                                                                            <option value="et"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'et' ? 'selected' : '' }}>
                                                                                Estonian - eesti</option>
                                                                            <option value="fo"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'fo' ? 'selected' : '' }}>
                                                                                Faroese - føroyskt</option>
                                                                            <option value="fil"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'fil' ? 'selected' : '' }}>
                                                                                Filipino</option>
                                                                            <option value="fi"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'fi' ? 'selected' : '' }}>
                                                                                Finnish - suomi</option>
                                                                            <option value="fr"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'fr' ? 'selected' : '' }}>
                                                                                French - français</option>
                                                                            <option value="fr-CA"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'fr-CA' ? 'selected' : '' }}>
                                                                                French (Canada) - français (Canada)
                                                                            </option>
                                                                            <option value="fr-FR"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'fr-FR' ? 'selected' : '' }}>
                                                                                French (France) - français (France)
                                                                            </option>
                                                                            <option value="fr-CH"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'fr-CH' ? 'selected' : '' }}>
                                                                                French (Switzerland) - français (Suisse)
                                                                            </option>
                                                                            <option value="gl"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'gl' ? 'selected' : '' }}>
                                                                                Galician - galego</option>
                                                                            <option value="ka"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'ka' ? 'selected' : '' }}>
                                                                                Georgian - ქართული</option>
                                                                            <option value="de"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'de' ? 'selected' : '' }}>
                                                                                German - Deutsch</option>
                                                                            <option value="de-AT"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'de-AT' ? 'selected' : '' }}>
                                                                                German (Austria) - Deutsch (Österreich)
                                                                            </option>
                                                                            <option value="de-DE"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'de-DE' ? 'selected' : '' }}>
                                                                                German (Germany) - Deutsch (Deutschland)
                                                                            </option>
                                                                            <option value="de-LI"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'de-LI' ? 'selected' : '' }}>
                                                                                German (Liechtenstein) - Deutsch
                                                                                (Liechtenstein)
                                                                            </option>
                                                                            <option value="de-CH"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'de-CH' ? 'selected' : '' }}>
                                                                                German (Switzerland) - Deutsch (Schweiz)
                                                                            </option>
                                                                            <option value="el"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'el' ? 'selected' : '' }}>
                                                                                Greek - Ελληνικά</option>
                                                                            <option value="gn"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'gn' ? 'selected' : '' }}>
                                                                                Guarani</option>
                                                                            <option value="gu"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'gu' ? 'selected' : '' }}>
                                                                                Gujarati - ગુજરાતી</option>
                                                                            <option value="ha"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'ha' ? 'selected' : '' }}>
                                                                                Hausa</option>
                                                                            <option value="haw"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'haw' ? 'selected' : '' }}>
                                                                                Hawaiian - ʻŌlelo Hawaiʻi</option>
                                                                            <option value="he"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'he' ? 'selected' : '' }}>
                                                                                Hebrew - עברית</option>
                                                                            <option value="hi"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'hi' ? 'selected' : '' }}>
                                                                                Hindi - हिन्दी</option>
                                                                            <option value="hu"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'hu' ? 'selected' : '' }}>
                                                                                Hungarian - magyar</option>
                                                                            <option value="is"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'is' ? 'selected' : '' }}>
                                                                                Icelandic - íslenska</option>
                                                                            <option value="id"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'id' ? 'selected' : '' }}>
                                                                                Indonesian - Indonesia</option>
                                                                            <option value="ia"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'ia' ? 'selected' : '' }}>
                                                                                Interlingua</option>
                                                                            <option value="ga"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'ga' ? 'selected' : '' }}>
                                                                                Irish - Gaeilge</option>
                                                                            <option value="it"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'it' ? 'selected' : '' }}>
                                                                                Italian - italiano</option>
                                                                            <option value="it-IT"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'it-IT' ? 'selected' : '' }}>
                                                                                Italian (Italy) - italiano (Italia)
                                                                            </option>
                                                                            <option value="it-CH"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'it-CH' ? 'selected' : '' }}>
                                                                                Italian (Switzerland) - italiano
                                                                                (Svizzera)
                                                                            </option>
                                                                            <option value="ja"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'ja' ? 'selected' : '' }}>
                                                                                Japanese - 日本語</option>
                                                                            <option value="kn"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'kn' ? 'selected' : '' }}>
                                                                                Kannada - ಕನ್ನಡ</option>
                                                                            <option value="kk"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'kk' ? 'selected' : '' }}>
                                                                                Kazakh - қазақ тілі</option>
                                                                            <option value="km"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'km' ? 'selected' : '' }}>
                                                                                Khmer - ខ្មែរ</option>
                                                                            <option value="ko"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'ko' ? 'selected' : '' }}>
                                                                                Korean - 한국어</option>
                                                                            <option value="ku"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'ku' ? 'selected' : '' }}>
                                                                                Kurdish - Kurdî</option>
                                                                            <option value="ky"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'ky' ? 'selected' : '' }}>
                                                                                Kyrgyz - кыргызча</option>
                                                                            <option value="lo"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'lo' ? 'selected' : '' }}>
                                                                                Lao - ລາວ</option>
                                                                            <option value="la"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'la' ? 'selected' : '' }}>
                                                                                Latin</option>
                                                                            <option value="lv"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'lv' ? 'selected' : '' }}>
                                                                                Latvian - latviešu</option>
                                                                            <option value="ln"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'ln' ? 'selected' : '' }}>
                                                                                Lingala - lingála</option>
                                                                            <option value="lt"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'lt' ? 'selected' : '' }}>
                                                                                Lithuanian - lietuvių</option>
                                                                            <option value="mk"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'mk' ? 'selected' : '' }}>
                                                                                Macedonian - македонски</option>
                                                                            <option value="ms"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'ms' ? 'selected' : '' }}>
                                                                                Malay - Bahasa Melayu</option>
                                                                            <option value="ml"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'ml' ? 'selected' : '' }}>
                                                                                Malayalam - മലയാളം</option>
                                                                            <option value="mt"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'mt' ? 'selected' : '' }}>
                                                                                Maltese - Malti</option>
                                                                            <option value="mr"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'mr' ? 'selected' : '' }}>
                                                                                Marathi - मराठी</option>
                                                                            <option value="mn"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'mn' ? 'selected' : '' }}>
                                                                                Mongolian - монгол</option>
                                                                            <option value="ne"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'me' ? 'selected' : '' }}>
                                                                                Nepali - नेपाली</option>
                                                                            <option value="no"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'no' ? 'selected' : '' }}>
                                                                                Norwegian - norsk</option>
                                                                            <option value="nb"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'nb' ? 'selected' : '' }}>
                                                                                Norwegian Bokmål - norsk bokmål</option>
                                                                            <option value="nn"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'nn' ? 'selected' : '' }}>
                                                                                Norwegian Nynorsk - nynorsk</option>
                                                                            <option value="oc"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'oc' ? 'selected' : '' }}>
                                                                                Occitan</option>
                                                                            <option value="or"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'or' ? 'selected' : '' }}>
                                                                                Oriya - ଓଡ଼ିଆ</option>
                                                                            <option value="om"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'om' ? 'selected' : '' }}>
                                                                                Oromo - Oromoo</option>
                                                                            <option value="ps"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'ps' ? 'selected' : '' }}>
                                                                                Pashto - پښتو</option>
                                                                            <option value="fa"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'fa' ? 'selected' : '' }}>
                                                                                Persian - فارسی</option>
                                                                            <option value="pl"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'pl' ? 'selected' : '' }}>
                                                                                Polish - polski</option>
                                                                            <option value="pt"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'pt' ? 'selected' : '' }}>
                                                                                Portuguese - português</option>
                                                                            <option value="pt-BR"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'pt-BR' ? 'selected' : '' }}>
                                                                                Portuguese (Brazil) - português (Brasil)
                                                                            </option>
                                                                            <option value="pt-PT"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'pt-PT' ? 'selected' : '' }}>
                                                                                Portuguese (Portugal) - português
                                                                                (Portugal)
                                                                            </option>
                                                                            <option value="pa"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'pa' ? 'selected' : '' }}>
                                                                                Punjabi - ਪੰਜਾਬੀ</option>
                                                                            <option value="qu"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'qu' ? 'selected' : '' }}>
                                                                                Quechua</option>
                                                                            <option value="ro"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'ro' ? 'selected' : '' }}>
                                                                                Romanian - română</option>
                                                                            <option value="mo"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'mo' ? 'selected' : '' }}>
                                                                                Romanian (Moldova) - română (Moldova)
                                                                            </option>
                                                                            <option value="rm"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'rm' ? 'selected' : '' }}>
                                                                                Romansh - rumantsch</option>
                                                                            <option value="ru"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'ru' ? 'selected' : '' }}>
                                                                                Russian - русский</option>
                                                                            <option value="gd"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'gd' ? 'selected' : '' }}>
                                                                                Scottish Gaelic</option>
                                                                            <option value="sr"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'sr' ? 'selected' : '' }}>
                                                                                Serbian - српски</option>
                                                                            <option value="sh"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'sh' ? 'selected' : '' }}>
                                                                                Serbo-Croatian - Srpskohrvatski</option>
                                                                            <option value="sn"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'sn' ? 'selected' : '' }}>
                                                                                Shona - chiShona</option>
                                                                            <option value="sd"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'sd' ? 'selected' : '' }}>
                                                                                Sindhi</option>
                                                                            <option value="si"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'si' ? 'selected' : '' }}>
                                                                                Sinhala - සිංහල</option>
                                                                            <option value="sk"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'sk' ? 'selected' : '' }}>
                                                                                Slovak - slovenčina</option>
                                                                            <option value="sl"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'sl' ? 'selected' : '' }}>
                                                                                Slovenian - slovenščina</option>
                                                                            <option value="so"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'so' ? 'selected' : '' }}>
                                                                                Somali - Soomaali</option>
                                                                            <option value="st"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'st' ? 'selected' : '' }}>
                                                                                Southern Sotho</option>
                                                                            <option value="es"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'es' ? 'selected' : '' }}>
                                                                                Spanish - español</option>
                                                                            <option value="es-AR"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'es-AR' ? 'selected' : '' }}>
                                                                                Spanish (Argentina) - español
                                                                                (Argentina)
                                                                            </option>
                                                                            <option value="es-419"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'es-419' ? 'selected' : '' }}>
                                                                                Spanish (Latin America) - español
                                                                                (Latinoamérica)
                                                                            </option>
                                                                            <option value="es-MX"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'es-MX' ? 'selected' : '' }}>
                                                                                Spanish (Mexico) - español (México)
                                                                            </option>
                                                                            <option value="es-ES"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'es-ES' ? 'selected' : '' }}>
                                                                                Spanish (Spain) - español (España)
                                                                            </option>
                                                                            <option value="es-US"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'es-US' ? 'selected' : '' }}>
                                                                                Spanish (United States) - español
                                                                                (Estados
                                                                                Unidos)
                                                                            </option>
                                                                            <option value="su"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'su' ? 'selected' : '' }}>
                                                                                Sundanese</option>
                                                                            <option value="sw"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'sw' ? 'selected' : '' }}>
                                                                                Swahili - Kiswahili</option>
                                                                            <option value="sv"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'sv' ? 'selected' : '' }}>
                                                                                Swedish - svenska</option>
                                                                            <option value="tg"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'tg' ? 'selected' : '' }}>
                                                                                Tajik - тоҷикӣ</option>
                                                                            <option value="ta"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'ta' ? 'selected' : '' }}>
                                                                                Tamil - தமிழ்</option>
                                                                            <option value="tt"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'tt' ? 'selected' : '' }}>
                                                                                Tatar</option>
                                                                            <option value="te"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'te' ? 'selected' : '' }}>
                                                                                Telugu - తెలుగు</option>
                                                                            <option value="th"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'th' ? 'selected' : '' }}>
                                                                                Thai - ไทย</option>
                                                                            <option value="ti"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'ti' ? 'selected' : '' }}>
                                                                                Tigrinya - ትግርኛ</option>
                                                                            <option value="to"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'to' ? 'selected' : '' }}>
                                                                                Tongan - lea fakatonga</option>
                                                                            <option value="tr"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'tr' ? 'selected' : '' }}>
                                                                                Turkish - Türkçe</option>
                                                                            <option value="tk"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'tk' ? 'selected' : '' }}>
                                                                                Turkmen</option>
                                                                            <option value="tw"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'tw' ? 'selected' : '' }}>
                                                                                Twi</option>
                                                                            <option value="uk"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'uk' ? 'selected' : '' }}>
                                                                                Ukrainian - українська</option>
                                                                            <option value="ur"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'ur' ? 'selected' : '' }}>
                                                                                Urdu - اردو</option>
                                                                            <option value="ug"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'ug' ? 'selected' : '' }}>
                                                                                Uyghur</option>
                                                                            <option value="uz"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'uz' ? 'selected' : '' }}>
                                                                                Uzbek - o‘zbek</option>
                                                                            <option value="vi"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'vi' ? 'selected' : '' }}>
                                                                                Vietnamese - Tiếng Việt</option>
                                                                            <option value="wa"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'wa' ? 'selected' : '' }}>
                                                                                Walloon - wa</option>
                                                                            <option value="cy"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'cy' ? 'selected' : '' }}>
                                                                                Welsh - Cymraeg</option>
                                                                            <option value="fy"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'fy' ? 'selected' : '' }}>
                                                                                Western Frisian</option>
                                                                            <option value="xh"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'xh' ? 'selected' : '' }}>
                                                                                Xhosa</option>
                                                                            <option value="yi"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'yi' ? 'selected' : '' }}>
                                                                                Yiddish</option>
                                                                            <option value="yo"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'yo' ? 'selected' : '' }}>
                                                                                Yoruba - Èdè Yorùbá</option>
                                                                            <option value="zu"
                                                                                {{ isset($languages['language']) && $languages['language'] == 'zu' ? 'selected' : '' }}>
                                                                                Zulu - isiZulu</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-2">
                                                                    <div class="form-outline">
                                                                        <label
                                                                            class="form-label fw-bold text-secondary">Level</label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-text"
                                                                                id="percentage">Level</span>
                                                                            <select id="language_level"
                                                                                name="language_level[]"
                                                                                placeholder="level"
                                                                                class="form-control"
                                                                                aria-describedby="percentage">
                                                                                <option value="">Select level
                                                                                </option>
                                                                                <option value="Native"
                                                                                    {{ isset($languages['language_level']) && $languages['language_level'] == 'Native' ? 'selected' : '' }}>
                                                                                    Native</option>
                                                                                <option value="Fluent"
                                                                                    {{ isset($languages['language_level']) && $languages['language_level'] == 'Fluent' ? 'selected' : '' }}>
                                                                                    Fluent</option>
                                                                                <option value="Basic"
                                                                                    {{ isset($languages['language_level']) && $languages['language_level'] == 'Basic' ? 'selected' : '' }}>
                                                                                    Basic</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                @endif
                                            </section>
                                        </div>
                                    </div>

                                    {{-- Interests --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h2 class="fw-bold text-secondary">Interests</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-primary" id="add_interest">Add
                                                        interest</button>
                                                </div>
                                            </div>
                                            <section class="interest_section">
                                            @if(isset($user['interests']))
                                                @foreach ($user['interests'] as $interests)
                                                    <div class="card mb-4">
                                                        <div class="card-body">
                                                            <span onclick="remove_section(this)"
                                                                class="position-absolute"
                                                                style="top: 10px; right: 15px; cursor: pointer;"><i
                                                                    class="fa fa-close"></i></span>
                                                            <div class="form-outline">
                                                                <label class="form-label fw-bold text-secondary">Add
                                                                    Interest</label>
                                                                <input type="text" id="interest"
                                                                    name="interest[]" class="form-control"
                                                                    placeholder="Add Interest"
                                                                    value="{{ isset($interests['interest']) ? $interests['interest'] : '' }}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                @endif
                                            </section>
                                        </div>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" id="submitbtn" class="btn btn-lg btn-success w-100">Save
                                        Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>
{{ view('layouts.footer') }}
