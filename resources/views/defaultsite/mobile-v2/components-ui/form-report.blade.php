<div class="d-flex justify-content-between">
    <p class="special-font-prompt text-uppercase fs-3 fw-bold">REPORT ARTICLE</p>
    <button type="button" class="close" style="color:#CA0000;" data-dismiss="modal">&times;</button>
</div>

<div class="d-flex gap-4 mt-5">
    <div class="desc-report">
        @include('image', [
            'source' => $row,
            'size' => '93x53',
            'force' => '93x53',
            $row['news_title'] ?? null,
        ])
    </div>
    <p class="special-font-lato fs-5 fw-bold">{{ $row['news_title'] ?? null }}</p>
</div>

<div class="form-report mt-5">
    <form class="form-submit">
        <input type="hidden" class="form-control" value="{{ url()->current() }}" name="url" hidden readonly>
        <div class="form-box">
            <input type="text" class="form-control " placeholder="First Name" value="" name="name">
            <label id="name-error" class="error label-error" for="name"></label>
        </div>
        <div class="form-box">
            <input type="email" class="form-control  " placeholder="Email" value="" name="from"
                required='required'>
            <label id="from-error" class="error label-error" for="from"></label>
        </div>
        <div class="form-box">
            <input type="text" class="form-control  " placeholder="Phone Number" value="" name="phone"
                rule='[^0-9]' required='required' minlength='9' maxlength='12'>
            <label id="phone-error" class="error label-error" for="phone"></label>
        </div>
        <div class="form-box">
            <input type="text" class="form-control  " placeholder="Head Report" value="" name="subject"
                required='required'>
            <label id="subject-error" class="error label-error" for="subject"></label>
        </div>
        <div class="form-box">
            <textarea class="form-control " rows="5" placeholder="Details" value="" name="content" required='required'></textarea>
            <label id="content-error" class="error label-error" for="content"></label>
        </div>
        <div class="form-box d-flex justify-content-end">
            <div class="form-button">
                <button type="submit" class="btn btn--submit py-2 px-6 rounded-md"
                    style="background-color: #CA0000; color: white">Send</button>
            </div>
        </div>
    </form>
</div>
