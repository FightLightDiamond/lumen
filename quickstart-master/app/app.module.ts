import { NgModule }      from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { AppComponent }  from './app.component';
import { TutorialComponent } from './tutorial.component';

@NgModule({
  imports:      [ BrowserModule ],
  declarations: [ AppComponent, TutorialComponent ], //Add information into this class
  bootstrap:    [ AppComponent ]
})
export class AppModule { }
