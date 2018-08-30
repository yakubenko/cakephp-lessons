<?php
return [
    'inputContainer' => '<div class="form-group {{required}}">{{content}}<small class="form-text text-muted">{{help}}</small></div>',
    'inputContainerError' => '<div class="form-group {{required}} error">{{content}}<small class="form-text text-muted">{{help}}</small>{{error}}</div>',
    'error' => '<div class="invalid-field">{{content}}</div>',
    'input' => '<input type="{{type}}" class="form-control" name="{{name}}"{{attrs}} />',
    // 'checkbox' => '<input type="checkbox" class="form-check-input" name="{{name}}" value="{{value}}"{{attrs}}>',
    'checkboxFormGroup' => '<div class="form-check">{{label}}</div>',
    'checkboxWrapper' => '<div class="form-check">{{label}}</div>',
    'nestingLabel' => '{{hidden}}{{input}}<label {{attrs}}>{{text}}</label>',
    'radioWrapper' => '<div class="form-check">{{label}}</div>',
    'radio' => '<input type="radio" class="form-check-input" name="{{name}}" value="{{value}}"{{attrs}}>',
    'textarea' => '<textarea class="form-control" name="{{name}}"{{attrs}}>{{value}}</textarea>'
];
