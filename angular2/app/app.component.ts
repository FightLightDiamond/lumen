/**
 * Created by e on 12/27/16.
 */
import { Component } from '@angular/core';

@Component({
    selector: 'my-app',
    template: `<h1>Hello {{name}}</h1>`
})
export class AppComponent { name = 'Angular'; }