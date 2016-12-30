import { Component } from '@angular/core';

@Component({
  selector: 'my-app',
  template: `<h1>Hello {{name}}!!!</h1>
            <my-tutorial></my-tutorial>
`,
})
export class AppComponent  { name = 'Angular'; }
