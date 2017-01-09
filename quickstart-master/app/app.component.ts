import {Component, ViewChild, OnInit} from '@angular/core';
import { u11Component } from './components/u11.component';
import {LoginService} from "./services/auth/login.service";

@Component({
  selector: 'my-app',
  templateUrl: 'app/templates/app.component.html',
  styleUrls : [
      'app/styles/validate.css'
  ]

})

export class AppComponent implements OnInit {
  title = 'Angular';
  public agree:number = 0;
  public disagree:number = 0;
  public names = ['Mr A', 'Mr B', 'Mr C', 'Mr D'];
  private u11cpnt: u11Component;
  public isLoggedin : boolean;

  @ViewChild(u11Component)

  constructor(private loginService: LoginService) {

  }

  ngOnInit() {
    this.isLoggedin = this.loginService.IsLogged;
  }

  parentVote(agree:boolean) {
    if(agree == true) {
      this.agree++;
    }else {
      this.disagree++;
    }
  }

  changeName(){
    this.u11cpnt.setName('Change name in Parent');
  }
  logout() {
    this.loginService.SetLogin(false)
    this.isLoggedin = false;
  }
}
