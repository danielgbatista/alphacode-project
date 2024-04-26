export interface SimpleContactModel{
  id: number;
  fullName: string;
  birthDate: string;
  email: string;
  cellPhone: string;
}

export interface ContactModel{
  id?: number;
  fullName: string;
  birthDate: string;
  email: string;
  job: string;
  phone: string;
  cellPhone: string;
  hasWhatsapp: boolean;
  sendEmailNotification: boolean;
  sendSmsNotification: boolean;
}
