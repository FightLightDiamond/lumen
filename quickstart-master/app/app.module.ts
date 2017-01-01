import { NgModule }      from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent }  from './app.component';
import { u10Component } from  './components/u10.component';
import { u11Component } from  './components/u11.component';
import { u14Component } from  './components/u14.component';
import { u15Component } from  './components/u15.component';

import { ExponentialStrengthPipe } from  './pipes/exponential-strength.pipe';
import { FormsModule } from '@angular/forms';

@NgModule({
  imports:      [
      BrowserModule,
      FormsModule
  ],
  declarations: [
      AppComponent,
      u10Component,
      u11Component,
      u14Component,
      u15Component,
      ExponentialStrengthPipe
  ],
  bootstrap:    [ AppComponent ]
})
export class AppModule { }
