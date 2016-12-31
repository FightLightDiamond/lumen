/**
 * Created by cuong on 12/30/16.
 */
import { Component, Input, Output, EventEmitter } from  '@angular/core'

@Component({
    selector: 'u10',

    template: `
    <h2>{{title}}</h2>
    <h3 *ngIf="show">This is ngIf directive line.</h3>
    
    <div [ngSwitch]="color">
        <p *ngSwitchCase="'red'">This line color is red</p>
        <p *ngSwitchCase="'blue'">This line color is blue</p>
        <p *ngSwitchCase="'green'">This line color is green</p>
        <p *ngSwitchCase="'black'">This line color is black</p>
        <p *ngSwitchDefault>This line color is white</p>
    </div>
    
    <ul> 
        <li *ngFor="let value of colors">{{value}}</li>
    </ul>
    
    <p [ngClass]="{classOne: cone, classTwo: ctwo}">This ngClass apply style</p>
    
    <button [ngStyle]="{'font-style':style, 'font-size':size}" (click)="toggle(1)">Change class one</button>
    <button (click)="toggle(2)">Change class two</button>
    
    <p>Child component: {{name}}</p>
    
    <button [disabled]="voted" (click)="vote(true)">Agree</button>
    <button [disabled]="voted" (click)="vote(false)">Disagree</button>
    
    Result: {{voted}}
`,
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
    public title = 'Fight Light Diamond';
    public color = "green";
    public colors: string[] = ['red', 'green', 'blue', 'white']

    public cone = true;
    public ctwo = true;

    public style = 'italic' ;
    public size = '22px';

    toggle(c){
        if(c == 1) this.cone = !this.cone;
        else this.ctwo = !this.ctwo;
    }

    public voted:boolean = false;

    vote(agree:boolean){
        this.voted = true;
        this.onVote.emit(agree)
    }

    setName(name:string) {
        this.name = name;
    }
}