import { catchError, retry } from 'rxjs/internal/operators';
import { Injectable } from '@angular/core';
import { HttpClient, HttpResponse, HttpErrorResponse, HttpParams } from '@angular/common/http';
import { User } from './user';
import { Observable, of } from 'rxjs';
import { map } from 'rxjs/operators';
import { HttpHeaders } from '@angular/common/http';

const apiUrl = 'http://localhost:8080/loginApi';

@Injectable({
  providedIn: 'root'
})
export class ApiService {

  constructor(private http: HttpClient) { }

  login(user: User): Observable<User> 
  {
  	return this.http.post<any>(apiUrl, user).pipe(catchError(err => {return ["Invalid user"];}),map(res => res));
  }
}
