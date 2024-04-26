import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment';
import { ContactModel, SimpleContactModel } from '../models/contact.model';
import { map } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ContactService {
  private url = `${environment.API_PATH}/contact`;
  private headers = new HttpHeaders()
  .set('Content-Type', 'application/json');

  constructor(private httpClient: HttpClient) { }

  register(body: ContactModel){
    return this.httpClient.post<[]>(`${this.url}/create`, body, { headers: this.headers });
  }

  update(body: ContactModel){
    return this.httpClient.put<[]>(`${this.url}/${body.id}/update`, body, { headers: this.headers });
  }

  list(){
    return this.httpClient.get<{data: SimpleContactModel[]}>(`${this.url}/list`).pipe(
      map(response => response.data)
    );
  }

  findById(id: number){
    return this.httpClient.get<{data: ContactModel}>(`${this.url}/${id}/find`).pipe(
      map(response => response.data)
    );
  }

  delete(id: number){
    return this.httpClient.delete<[]>(`${this.url}/${id}/delete`, { headers: this.headers });
  }
}
