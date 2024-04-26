import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { HeaderComponent } from './components/header/header.component';
import { FooterComponent } from './components/footer/footer.component';
import { HttpClientModule } from '@angular/common/http';
import { ContactService } from './services/contact.service';
import { CommonModule, DatePipe } from '@angular/common';
import { Observable } from 'rxjs';
import { ContactModel, SimpleContactModel } from './models/contact.model';
import { FormsModule } from '@angular/forms';
import { NgxMaskDirective, NgxMaskPipe, NgxMaskService, provideNgxMask } from 'ngx-mask';
import { getDateFromString } from './utils/getDateFromString.function';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [
    RouterOutlet,
    HeaderComponent,
    FooterComponent,
    HttpClientModule,
    CommonModule,
    FormsModule,
    NgxMaskDirective,
    NgxMaskPipe
  ],
  providers: [ContactService, DatePipe],
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
})
export class AppComponent {
  contacts$ = new Observable<SimpleContactModel[]>();
  contact : ContactModel;

  constructor(private contactService: ContactService, private datePipe: DatePipe){
    this.listContacts();
    this.contact = {
      id: 0,
      fullName: '',
      birthDate: '',
      email: '',
      job: '',
      phone: '',
      cellPhone: '',
      hasWhatsapp: false,
      sendEmailNotification: false,
      sendSmsNotification: false
    };
  }

  listContacts(){
    this.contacts$ = this.contactService.list();
  }

  fillFields(id: number){
    this.contactService.findById(id).subscribe(contact => {
      let contactCopy = contact;
      contactCopy.birthDate = this.datePipe.transform(contactCopy.birthDate, 'dd-MM-yyyy')!;
      this.contact = contactCopy;
    });
  }

  register(body: ContactModel){
    const contactCopy = { ...body };
    const date = getDateFromString(contactCopy.birthDate);
    contactCopy.birthDate = this.datePipe.transform(date, 'yyyy-MM-dd')!;
    this.contactService.register(contactCopy).subscribe(_ => {
      this.listContacts()
    });
    this.clearForm();
  }

  update(body: ContactModel){
    const contactCopy = {...body };
    const date = getDateFromString(contactCopy.birthDate);
    contactCopy.birthDate = this.datePipe.transform(date, 'yyyy-MM-dd')!;
    this.contactService.update(contactCopy).subscribe(_ => {
      this.listContacts()
    });
    this.clearForm();
  }

  onDelete(id: number){
    this.contactService.delete(id)
      .subscribe(_ => this.listContacts());
  }

  onSubmit(){
    if(this.contact.id){
      this.update(this.contact);
    }else{
      this.register(this.contact);
    }
  }

  clearForm() {
    this.contact = {
      fullName: '',
      birthDate: '',
      email: '',
      job: '',
      phone: '',
      cellPhone: '',
      hasWhatsapp: false,
      sendEmailNotification: false,
      sendSmsNotification: false
    };
  }
}
