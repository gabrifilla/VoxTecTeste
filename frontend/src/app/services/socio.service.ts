import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class SocioService {
  private apiUrl = 'http://localhost:8080/api/socios';

  constructor(private http: HttpClient) { }

  getSocios(): Observable<any> {
    return this.http.get(this.apiUrl);
  }

  getSocio(id: number): Observable<any> {
    return this.http.get(`${this.apiUrl}/${id}`);
  }

  createSocio(socio: any): Observable<any> {
    return this.http.post(this.apiUrl, socio);
  }

  updateSocio(id: number, socio: any): Observable<any> {
    return this.http.put(`${this.apiUrl}/${id}`, socio);
  }

  deleteSocio(id: number): Observable<any> {
    return this.http.delete(`${this.apiUrl}/${id}`);
  }
}
