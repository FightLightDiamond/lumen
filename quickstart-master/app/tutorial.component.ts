/**
 * Created by e on 12/30/16.
 */
import { Component } from '@angular/core';

@Component({
    selector: 'my-tutorial',
    template: `<h2>This is Keeng <small>{{title}}</small>!!!!</h2>
                <h3 [class.bg]="applyClass">This is develop</h3>
                <button (click)="OnClick(name.value)">Click me</button>
                <button (mouseover)="MouseOver($event)">MouseOver me</button>
                <input type="text" #name>
                <input type="text" value="two way binding" [(ngModel)]="fname" >
                <input type="text" value="" [(ngModel)]="lname">
                <br> {{fname}}  {{lname}}
                
            `,


    styles: [`
                h2 {color:red; font-style: italic}
                .bg {background: silver}
                
            `]
})

export class TutorialComponent {
    public applyClass = true;
    public title = "VT - TT";

    OnClick(value: string){
        this.title = value;
        alert('You have click ' + value);
    }
    MouseOver(e:any){
        console.log(e);
    }

   // public fname = 1;
    //public lname = 2;
}