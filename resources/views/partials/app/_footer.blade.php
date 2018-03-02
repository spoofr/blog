<div class="uk-section uk-section-primary ">
    <div class="uk-container">
        <div uk-grid>
            <div class="uk-width-expand@m">
                <h1>Newsletter</h1>
            </div>
            <div class="uk-width-1-2@m">
                <input class="uk-input uk-form-width-expand uk-form-large" type="text" placeholder="name@domain.com">
            </div>
        </div>
    </div>
</div>

<div class="uk-section uk-section-secondary ">
    <div class="uk-container">
        <div uk-grid>
            <div class="uk-width-1-3@m">
                <h3>
                    <span class="uk-margin-small-right" uk-icon="icon: phone; ratio: 2"></span>{{ $setting->contact_number }}</h3>
            </div>
            <div class="uk-width-1-3@m">
                <h3>
                    <span class="uk-margin-small-right" uk-icon="icon: mail; ratio: 2"></span>{{ $setting->contact_email }}</h3>
            </div>
            <div class="uk-width-1-3@m">
                <h3>
                    <span class="uk-margin-small-right" uk-icon="icon: location; ratio: 2"></span>{{ $setting->address }}.</h3>
            </div>
        </div>
    </div>
</div>