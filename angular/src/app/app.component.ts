import { Component } from '@angular/core';
import { NgModule } from '@angular/core';
import { ApiService } from './api.service';
import { User } from './user';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
})

export class AppComponent {
  title = 'angular';

  users: User[] = [];
  headers: any;
  spresp: any;
  postdata: User = {username: "jtocino@candoit.com.ar", password: "asd1234"};

  constructor(private api: ApiService) {}

	ngAfterContentInit() 
	{
		this.login();
	} 

	login() 
	{
		this.api.login(this.postdata).subscribe(res => {console.log(res)});
	}

}
