/**
 * Created by cuong on 12/31/16.
 */
import { Component } from '@angular/core';

@Component({
    selector: 'u15',
    templateUrl: 'app/templates/u15.component.html',
    styleUrls: ['app/styles/u15.component.css']
})

export class u15Component {
    onSubmit(form){
        console.log(form);
    }
}