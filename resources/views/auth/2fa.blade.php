<form class="form-horizontal" method="POST" action="{{ route('enable2fa') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('verify-code') ? ' has-error' : '' }}">
    <label for="verify-code" class="col-md-4 control-label">Authenticator Code</label>
    <div class="col-md-6">
    <input id="verify-code" type="password" class="form-control" name="password" required>
    @if ($errors->has('verify-code'))
    <span class="help-block">
    <strong>{{ $errors->first('verify-code') }}</strong>
    </span>
    @endif
    </div>
    </div>
    <div class="form-group">
    <div class="col-md-6 col-md-offset-4">
    <button type="submit" class="btn btn-primary">
    Enable 2FA
    </button>
    </div>
    </div>
    </form>