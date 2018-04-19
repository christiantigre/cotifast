<div class="form-group {{ $errors->has('section') ? 'has-error' : ''}}">
    <label for="section" class="col-md-4 control-label">{{ 'Section' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="section" type="text" id="section" value="{{ $clausula->section or ''}}" >
        {!! $errors->first('section', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('clausula') ? 'has-error' : ''}}">
    <label for="clausula" class="col-md-4 control-label">{{ 'Clausula' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="clausula" type="textarea" id="clausula" >{{ $clausula->clausula or ''}}</textarea>
        {!! $errors->first('clausula', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('activo') ? 'has-error' : ''}}">
    <label for="activo" class="col-md-4 control-label">{{ 'Activo' }}</label>
    <div class="col-md-6">
        <select name="activo" class="form-control" id="activo" >
    @foreach (json_decode('{"0":"NO","1":"SI"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($clausula->activo) && $clausula->activo == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
        {!! $errors->first('activo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
