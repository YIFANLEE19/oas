<div>
    <div class="container">
        {{-- header --}}
        <div class="row">
            <div class="col-xl-12">
                <div class="border-bottom">
                    <h3 class="fw-bold">Personal Particulars</h3>
                    <p class="text-secondary">Guardian Particulars</p>
                </div>
            </div>
        </div>
        {{-- end header --}}
    </div>
    {{-- form --}}
    <div class="container mt-4">
        <form action="#" >
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <label for="en_name" class="form-label fw-bold">English Name<span class="text-danger">*</span></label>
                    <input type="text" name="en_name" id="en_name" class="form-control form-control-lg" required>
                </div>
                <div class="col-md-4">
                    <label for="ch_name" class="form-label fw-bold">Chinese Name</label>
                    <input type="text" name="ch_name" id="ch_name" class="form-control form-control-lg">
                </div>
                <div class="col-md-4">
                    <label for="email" class="form-label fw-bold">Email address<span class="text-danger">*</span></label>
                    <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="abc@email.com" required>
                </div>
            </div>
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <label for="ic" class="form-label fw-bold">Identity card</label>
                    <input type="text" name="ic" id="ic" class="form-control form-control-lg" required>
                </div>
                <div class="col-md-4">
                    <label for="gender" class="form-label fw-bold">Gender</label><br>
                    <div class="d-flex align-items-center"></div>
                </div>
            </div>
        </form>
    </div>  
    {{-- end form --}}
</div>
