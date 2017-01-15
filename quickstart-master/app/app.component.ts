import {Component} from '@angular/core';
import {LoginService} from "./services/auth/login.service";

@Component({
  selector: 'my-app',
  templateUrl: 'app/templates/app.component.html',
  styleUrls : [
      'app/styles/validate.css'
  ]
})

export class AppComponent {
  title = 'Angular';

  constructor(private loginService: LoginService) {

  }

  logout() {
    this.loginService.SetLogin(false);
    alert('Logout success')
  }
}
