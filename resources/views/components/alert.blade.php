@if(session('success'))<div class="mb-5 rounded-xl bg-emerald-50 border border-emerald-200 px-4 py-3 text-emerald-800">{{ session('success') }}</div>@endif
@if($errors->any())<div class="mb-5 rounded-xl bg-red-50 border border-red-200 px-4 py-3 text-red-800">{{ $errors->first() }}</div>@endif
