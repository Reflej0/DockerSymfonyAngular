import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

import { User } from '@/_models';

@Injectable({ providedIn: 'root' })
export class UserService {
    constructor(private http: HttpClient) { }

    getAll() 
    {
        return this.http.get<User[]>(`${config.userAll}`);
    }

    register(user: User) 
    {
        return this.http.post(`${config.userRegister}`, user);
    }

    delete(id: number) 
    {
        const httpOptions = {headers: new HttpHeaders({'Content-Type':  'application/json','X-AUTH-TOKEN': JSON.parse(localStorage.currentUser).token})};
        return this.http.post(`${config.userDelete}`, {"id": id}, httpOptions);
    }
}