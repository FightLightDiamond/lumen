import { Component, ViewChild } from '@angular/core';
import { u10Component } from './u10.component';

@Component({
  selector: 'my-app',
  template: `<h1>Hello {{title}}</h1>
  <input type="text" #textName (keyup)="0">
  
   Agree: {{agree}}
   <br>
   Disagree: {{disagree}}
   <button (click)="changeName()" >Change Name</button>
  
   <u10 
   *ngFor="let person of names" 
   [name]="person" 
   (onVote)="parentVote($event)" 
   ></u10>
  
`,
})

export class AppComponent {
  title = 'Angular';
  public agree:number = 0;
  public disagree:number = 0;
  public names = ['Mr A', 'Mr B', 'Mr C', 'Mr D'];
  parentVote(agree:boolean) {
    if(agree == true) {
      this.agree++;
    }else {
      this.disagree++;
    }
  }
  @ViewChild(u10Component)
  private u10cpnt: u10Component;

  changeName(){
    this.u10cpnt.setName('Change name in Parent');
  }

}
