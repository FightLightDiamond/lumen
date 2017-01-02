import { NgModule }      from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent }  from './app.component';
import { u10Component } from  './components/u10.component';
import { u11Component } from  './components/u11.component';
import { u14Component } from  './components/u14.component';
import { u15Component } from  './components/u15.component';
import { EmployeeListComponent } from './components/employee.component';

import { ExponentialStrengthPipe } from  './pipes/exponential-strength.pipe';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http'

@NgModule({
  imports:      [
      BrowserModule,
      FormsModule,
      HttpModule
  ],
  declarations: [
      AppComponent,
      u10Component,
      u11Component,
      u14Component,
      u15Component,
      ExponentialStrengthPipe,
      EmployeeListComponent
  ],
  bootstrap:    [ AppComponent ]
})
export class AppModule { }
