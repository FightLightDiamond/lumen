import { Component } from '@angular/core';

@Component({
  selector: 'my-app',
  template: `<h1>Hello {{name}} - {{year}}!!!</h1>
            <my-tutorial></my-tutorial>
            <img [src]="image" alt="">
            <input type="text" [value]="welcomeText"> {{welcomeText}}
            <h4 [style.color]="blueColor?'blue':'green'">You are victory</h4>
`,

})
export class AppComponent  {
  public name = 'KEENG';
  public year = 2016;
  //property binding
  public image = "http://lorempixel.com/200/200";
  public welcomeText = "Welcome KEENG";
  public blueColor = true;
}
