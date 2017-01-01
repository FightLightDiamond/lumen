import { Component, ViewChild } from '@angular/core';
import { u11Component } from './components/u11.component';


@Component({
  selector: 'my-app',
  templateUrl: 'app/templates/app.component.html',
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
  @ViewChild(u11Component)
  private u11cpnt: u11Component;

  changeName(){
    this.u11cpnt.setName('Change name in Parent');
  }

}
