import { NgModule }      from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent }  from './app.component';
import { u10Component } from  './u10.component'

@NgModule({
  imports:      [ BrowserModule ],
  declarations: [ AppComponent, u10Component ],
  bootstrap:    [ AppComponent ]
})
export class AppModule { }
