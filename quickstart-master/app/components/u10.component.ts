/**
 * Created by cuong on 12/30/16.
 */
import { Component, Input, Output, EventEmitter } from  '@angular/core'

@Component({
    selector: 'u10',
    templateUrl: 'app/templates/u10.component.html',
    styles:[
        `
            .classOne{
                color:silver;
            }
            .classTwo{
                background: black;
            }  

        `
    ],

})

export class u10Component {
    @Input() name: string;
    @Output() onVote = new EventEmitter<boolean>();

    public show = false;

    public color = "green";
    public colors: string[] = ['red', 'green', 'blue', 'white']

    public cone = true;
    public ctwo = true;

    public style = 'italic' ;
    public size = '22px';

    toggle(c: number){
        if(c == 1) this.cone = !this.cone;
        else this.ctwo = !this.ctwo;
    }

}