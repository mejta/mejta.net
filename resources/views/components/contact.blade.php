<div class="contact" id="contact">
    <div class="contact__column">
        <h2>@lang('web.contact.contact-me')</h2>
        <p>
            @lang('web.contact.text')
        </p>
        <div class="contact__info">
           Daniel Mejta<br>
            P_<a href="tel:+420776665787">+420 776 665 787</a><br>
            E_<a href="mailto:daniel@mejta.net">daniel@mejta.net</a>
        </div>
    </div>
    <div class="contact__column contact__column--form">
        <h2>@lang('web.contact.write-me')</h2>
        <c-form
            url="/api/messages"
            method="post"
            :enable-recaptcha="true"
            success-message="@lang('web.contact.form.success')"
            submit-button="@lang('web.contact.form.submit')"
            submitting-button="@lang('web.contact.form.submitting')"
        >
            <c-input
                type="textarea"
                label="@lang('web.contact.form.message')"
                name="message"
                :required="true"
            ></c-input>
            <c-input
                type="text"
                label="@lang('web.contact.form.name')"
                name="name"
            ></c-input>
            <c-input
                type="tel"
                label="@lang('web.contact.form.phone')"
                name="phone"
            ></c-input>
            <c-input
                type="email"
                label="@lang('web.contact.form.email')"
                name="email"
                :required="true"
            ></c-input>
            <c-input
                type="text"
                label="@lang('web.contact.form.budget')"
                name="budget"
            ></c-input>
        </c-form>
    </div>
    <div class="contact__column contact__column--social">
        <h2>@lang('web.contact.visit-me')</h2>
        <div class="contact__address">
            <address>
                <strong>URBAN PLAN HUB</strong><br>
                Opletalova 1417/25<br>
                110 00 Praha 1 - Nové Město<br>
                Czechia
            </address>
            <address>
                <strong>Daniel Mejta</strong><br>
                IČ: 86592378<br>
                DIČ: CZ8308180023<br>
                <br>
                Františka Diviše 1438/54R<br>
                104 00 Praha 10 - Uhříněves<br>
                Czechia
            </address>
        </div>
        <h2>@lang('web.contact.follow-me')</h2>
        <social-icons
            facebook="https://facebook.com/mejta"
            linkedin="https://linkedin.com/in/mejta"
            github="https://github.com/mejta"
        />
    </div>
</div>
