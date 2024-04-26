export const getDateFromString = (input: string): Date => {
  const day = input.substring(0, 2);
  const month = input.substring(2, 4);
  const year = input.substring(4, 8);
  return new Date(+year, +month - 1, +day);
}
