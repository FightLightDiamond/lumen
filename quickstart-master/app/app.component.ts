import { Component } from '@angular/core';

@Component({
  selector: 'my-app',
  template: `<h1>Hello {{name}}</h1>`,
})

@Component({
  selector: 'input-form-example',
  templateUrl: './input-form-example.html',
  styleUrls: ['./input-form-example.css'],
})

export class AppComponent  { name = 'Angular'; }
export class InputFormExample {}